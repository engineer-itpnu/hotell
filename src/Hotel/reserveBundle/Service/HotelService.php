<?php
namespace Hotel\reserveBundle\Service;

use Doctrine\ORM\EntityManager;
use Hotel\reserveBundle\Entity\accountEntity;
use Hotel\reserveBundle\Entity\blankEntity;
use Hotel\reserveBundle\Entity\customerEntity;
use Hotel\reserveBundle\Entity\hotelEntity;
use Hotel\reserveBundle\Entity\reserveEntity;
use Hotel\reserveBundle\Entity\roomEntity;
use Hotel\reserveBundle\Handler\DateConvertor;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class HotelService {

    /**
     * @var DateConvertor
     */
    private $dateconvertor;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var EncoderFactory
     */
    private $encoderFactory;

    /**
     * @param DateConvertor $dc
     * @param EntityManager $em
     * @param EncoderFactory $ef
     */
    public function __construct(DateConvertor $dc, EntityManager $em, EncoderFactory $ef)
    {
        $this->dateconvertor = $dc;
        $this->em = $em;
        $this->encoderFactory = $ef;
    }

    //-----------------------------------------------------------------------------
    public function ListRooms($input)
    {
        $RoomListRequest = new RoomListRequest();
        HotelService::CopyObject($input,$RoomListRequest);

        //get user Agency
        $userAgency = $this->getUserAgency($RoomListRequest->agency_info);
        if(!$userAgency)
            return new RoomListResponse("User Not Verified",null);

        if(!$userAgency->hasRole("ROLE_AGENCY") || !$userAgency->getAgencyEntity())
            return new RoomListResponse("User is not Agency",null);

        //get shamsi Date
        if($RoomListRequest->date == null || $RoomListRequest->date == "")
            return new RoomListResponse("Date Not Valid",null);
        $date = null;
        try{
            $date = $this->dateconvertor->ShamsiToMiladi($RoomListRequest->date);
            date_time_set($date,0,0,0);
        }catch(\Exception $ex){
            return new RoomListResponse("Date Not Valid",null);
        }

        //check days count
        if($RoomListRequest->days_count <= 0)
            return new RoomListResponse("days count not valid",null);

        //check city name
        if($RoomListRequest->city == null || $RoomListRequest->city == "")
            return new RoomListResponse("city not valid",null);

        $qb = $this->em->createQueryBuilder()
            -> select("b")
            ->from("HotelreserveBundle:blankEntity","b")
            ->innerJoin("b.roomEntity","r")
            ->innerJoin("r.hotelEntity","h")
            ->where("b.status = :status")->setParameter("status","0")
            ->andWhere("b.dateIN = :date")->setParameter("date",$date)
            ->andWhere("h.hotel_city LIKE :city")->setParameter("city",$RoomListRequest->city)
            ;
        $firstBlanks = $qb->getQuery()->getResult();

        $hotels = array();
        foreach($firstBlanks as $firstBlank)
        {
            $resPrices = $this->checkIsEmptyNextDays($firstBlank,$date, $RoomListRequest->days_count);
            if($resPrices)
                $this->addRoom($hotels,$firstBlank->getRoomEntity(),$resPrices);
        }

        return new RoomListResponse("Success",$hotels);
    }

    //-----------------------------------------------------------------------------
    public function PreReserve($input)
    {
        $PreReserveRequest = new PreReserveRequest();
        HotelService::CopyObject($input,$PreReserveRequest);

        //get user Agency
        $userAgency = $this->getUserAgency($PreReserveRequest->agency_info);
        if(!$userAgency)
            return new PreReserveResponse(null,null,null,"User Not Verified");

        if(!$userAgency->hasRole("ROLE_AGENCY") || !$userAgency->getAgencyEntity())
            return new PreReserveResponse(null,null,null,"User is not Agency");

        //get Customer
        $customer = null;
        if($PreReserveRequest->customer_code != null || $PreReserveRequest->customer_code!= "")
            $customer = $this->em->getRepository("HotelreserveBundle:customerEntity")->find($PreReserveRequest->customer_code);

        if ($customer == null)
        {
            HotelService::log("customer_code is null");
            $customerReq = $PreReserveRequest->customer;
            if(!$customerReq->first_name || !$customerReq->last_name || !$customerReq->email || !$customerReq->mobile || !$customerReq->phone)
                return new PreReserveResponse(null,null,null,"Customer Not Found");

            $customer = new customerEntity();
            $customer->setCustName($customerReq->first_name);
            $customer->setCustFamily($customerReq->last_name);
            $customer->setCustEmail($customerReq->email);
            $customer->setCustMobile($customerReq->mobile);
            $customer->setCustPhone($customerReq->phone);
            $this->em->persist($customer);
            $this->em->flush();
        }

        //get shamsi Date
        if($PreReserveRequest->date == null || $PreReserveRequest->date == "")
            return new PreReserveResponse(null,null,null,"Date Not Valid");

        $date = null;
        try{
            $date = $this->dateconvertor->ShamsiToMiladi($PreReserveRequest->date);
        }catch(\Exception $ex){
            return new PreReserveResponse(null,null,null,"Date Not Valid");
        }

        //check room and hotel code
        $hotel = $this->em->getRepository("HotelreserveBundle:hotelEntity")->find($PreReserveRequest->hotel_code);
        $room = $this->em->getRepository("HotelreserveBundle:roomEntity")->find($PreReserveRequest->room_code);

        if(!$hotel)
            return new PreReserveResponse(null,null,null,"hotel code not valid");

        if(!$room)
            return new PreReserveResponse(null,null,null,"room code not valid");

        if($room->getHotelEntity()!=$hotel)
            return new PreReserveResponse(null,null,null,"room is not in hotel");

        //check days count
        if($PreReserveRequest->days_count <= 0)
            return new PreReserveResponse(null,null,null,"days count not valid");

        //check extra capacity count
        if($PreReserveRequest->extra_capacity_count < 0)
            return new PreReserveResponse(null,null,null,"extra capacity count not valid");

        //create reserve
        $reserveEntity = new reserveEntity();
        $reserveEntity->setCustomerEntity($customer);
        $reserveEntity->setAgencyEntity($userAgency->getAgencyEntity());
        $reserveEntity->setDateInp($date);

        $money = 0;
        $day = clone $date;
        for($i=0;$i<$PreReserveRequest->days_count;$i++)
        {
            if($i!=0) $day->add(new \DateInterval("P1D"));
            HotelService::log("day+$i:".date_format($day,"Y-m-d"));
            $blankEntity = $this->em->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("dateIN"=>$day,"roomEntity"=>$room));

            if(!$blankEntity || $blankEntity->getStatus()!=0)
                return new PreReserveResponse(null,null,null,"room not empty in ".$this->dateconvertor->MiladiToShamsi($day));

            $blankEntity->setStatus(1);
            $blankEntity->setReserveEntity($reserveEntity);
            $reserveEntity->addBlankEntitie($blankEntity);

            $money += $blankEntity->getTariff();
        }
        $money += $PreReserveRequest->extra_capacity_count * $hotel->getHotelAddRoomTtariff();

        $reserveEntity->setMoney($money);
        $reserveEntity->setCountNight($PreReserveRequest->days_count);
        $reserveEntity->setDateCreate(new \DateTime());
        $this->em->persist($reserveEntity);
        $this->em->flush();

        return new PreReserveResponse($money,$reserveEntity->getId(),$customer->getId(),"Success");
    }

    //-----------------------------------------------------------------------------
    public function Reserve($input)
    {
        $ReserveRequest = new ReserveRequest();
        HotelService::CopyObject($input,$ReserveRequest);

        //get user Agency
        $userAgency = $this->getUserAgency($ReserveRequest->agency_info);
        if(!$userAgency)
            return new ReserveResponse(null,null,"User Not Verified");

        if(!$userAgency->hasRole("ROLE_AGENCY") || !$userAgency->getAgencyEntity())
            return new ReserveResponse(null,null,"User is not Agency");

        //get reserve code
        $reserveEntity = $this->em->getRepository("HotelreserveBundle:reserveEntity")->find($ReserveRequest->reserve_code);
        if(!$reserveEntity)
            return new ReserveResponse(null,null,"Reserve Code not Valid");

        //get hotel
        $firstBlankEntities = $reserveEntity->getBlankEntities();
        $hotel = $firstBlankEntities[0]->getRoomEntity()->getHotelEntity();

        //check is not already reserve finished
        if($firstBlankEntities[0]->getStatus()!=1)
            return new ReserveResponse(null,null,"Reserve Code already used");

        //get hotel Balance
        $lastHotelAccounting = $this->em->getRepository("HotelreserveBundle:accountEntity")->findOneBy(array("hotelEntity"=>$hotel),array("id"=>"desc"));
        $hotelBalance = $lastHotelAccounting==null?0:$lastHotelAccounting->getStockHotel();

        //get agency Balance
        $lastAgencyAccounting = $this->em->getRepository("HotelreserveBundle:accountEntity")->findOneBy(array("agencyEntity"=>$userAgency->getAgencyEntity()),array("id"=>"desc"));
        if(!$lastAgencyAccounting || $lastAgencyAccounting->getStockAgency()<$reserveEntity->getMoney())
            return new ReserveResponse(null,null,"Agency has not enough Balance");
        $agencyBalance = $lastAgencyAccounting->getStockAgency();

        //update blank entities to reserve finished
        foreach($reserveEntity->getBlankEntities() as $blankEntity)
            $blankEntity->setStatus(2);

        //create accounting
        $accountEntity = new accountEntity();
        $accountEntity->setAgencyEntity($reserveEntity->getAgencyEntity());
        $accountEntity->setCustomerEntity($reserveEntity->getCustomerEntity());
        $accountEntity->setDateTime(new \DateTime());
        $accountEntity->setHotelEntity($hotel);
        $accountEntity->setPrice($reserveEntity->getMoney());
        $accountEntity->setType(2);
        $accountEntity->setStockAgency($agencyBalance-$reserveEntity->getMoney());
        $accountEntity->setStockHotel($hotelBalance+$reserveEntity->getMoney());
        $accountEntity->setReserveEntity($reserveEntity);
        $reserveEntity->addAccountEntitie($accountEntity);
        $this->em->persist($accountEntity);
        $this->em->flush();

        return new ReserveResponse($accountEntity->getId(),$agencyBalance-$reserveEntity->getMoney(),"Success");
    }

    //-----------------------------------------------------------------------------
    private function getUserAgency($agency)
    {
        $user = $this->em->getRepository("HotelreserveBundle:userEntity")->findOneBy(array("username"=>$agency->username));
        if($user == null)return null;
        $encoder = $this->encoderFactory->getEncoder($user);
        return $encoder->isPasswordValid($user->getPassword(),$agency->password,$user->getSalt())?$user:null;
    }

    private function addRoom(&$hotels,roomEntity $roomEntity,$prices)
    {
        $hotelEntity = $roomEntity->getHotelEntity();

        // find hotel in list
        $selHotel = null;
        foreach($hotels as $hotel)
            if($hotelEntity->getId() == $hotel->code) $selHotel = $hotel;

        //create hotel if not exist in list
        if(!$selHotel)
        {
            $selHotel = new Hotel(
                $hotelEntity->getId(),
                $hotelEntity->getHotelName(),
                $hotelEntity->getHotelGrade(),
                $hotelEntity->getHotelPhone(),
                $hotelEntity->getHotelAddRoomTtariff()
            );
            $hotels [] = $selHotel;
        }

        $roomTypes = array(
            '0' => 'سوئيت', '1' => 'سوئيت vip', '2' => 'سوئيت جونيور', '3' => 'سوئيت پرزيدنت', '4' => 'سوئيت رويال',
            '5' => 'سوئيت امپريال', '6' => 'سوئيت لاکچري', '7' => 'سوئيت دوبلکس', '8' => 'سوئيت لوکس', '9' => 'پرنسس روم',
            '10' => 'پرزيدنتال', 'l1' => 'تريپل', '12' => 'سينگل', '13' => 'دبل', '14' => 'کانکت روم',
            '15' => 'آپارتمان', '16' => 'آپارتمان رويال'
        );

        //create array of days and sum of Tariffs
        $sumPrices = 0;
        $days = array();
        foreach ($prices as $day=>$price)
        {
            $days [] = new Day($day,$price);
            $sumPrices += $price;
        }

        //add room to hotel
        $selHotel->rooms [] = new Room(
            $roomEntity->getId(),
            $roomTypes[$roomEntity->getRoomType()],
            $roomEntity->getRoomCapacity(),
            $roomEntity->getRoomAddCapacity(),
            $sumPrices,
            $days
        );
    }

    private function checkIsEmptyNextDays(blankEntity $firstBlank,\DateTime $firstday, $countDays)
    {
        $prices = array();
        $nextdays = clone $firstday;
        $prices [$this->dateconvertor->MiladiToShamsi($nextdays)] = $firstBlank->getTariff();
        for($i=1;$i<$countDays;$i++)
        {
            $nextdays->add(new \DateInterval("P1D"));
            $nextBlank = $this->em->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("dateIN"=>$nextdays,"roomEntity"=>$firstBlank->getRoomEntity()));
            if(!$nextBlank || $nextBlank->getStatus()!=0)
                return null;
            $prices [$this->dateconvertor->MiladiToShamsi($nextdays)] = $firstBlank->getTariff();
        }
        return $prices;
    }

    static public function log($message)
    {
        $file= fopen(@"../app/logs/service.txt","a");
        fwrite($file,"[".date_format(new \DateTime(),"Y-m-d H:i:s")."] ".$message."\r\n");
    }

    static public function CopyObject($objectFrom,$objectTo)
    {
        foreach (get_object_vars($objectFrom) as $key => $value)
            $objectTo->$key = $value;
    }
} 