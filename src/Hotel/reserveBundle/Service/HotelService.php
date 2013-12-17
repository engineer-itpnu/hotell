<?php
namespace Hotel\reserveBundle\Service;

use Doctrine\ORM\EntityManager;
use Hotel\reserveBundle\Entity\accountEntity;
use Hotel\reserveBundle\Entity\blankEntity;
use Hotel\reserveBundle\Entity\customerEntity;
use Hotel\reserveBundle\Entity\reserveEntity;
use Hotel\reserveBundle\Entity\roomEntity;
use Hotel\reserveBundle\Handler\DateConvertor;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 * Class HotelService
 * @package Hotel\reserveBundle\Service
 */
class HotelService {

    /**
     * @var array
     */
    private $roomTypes = array(
        '1' => 'سوئيت vip', '2' => 'سوئيت جونيور', '3' => 'سوئيت پرزيدنت', '4' => 'سوئيت رويال',
        '5' => 'سوئيت امپريال', '6' => 'سوئيت لاکچري', '7' => 'سوئيت دوبلکس', '8' => 'سوئيت لوکس', '9' => 'پرنسس روم',
        '10' => 'پرزيدنتال', '11' => 'تريپل', '12' => 'سينگل', '13' => 'دبل', '14' => 'کانکت روم',
        '15' => 'آپارتمان', '16' => 'آپارتمان رويال','17' => 'سوئيت'
    );

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
    /**
     * @param $input
     * @return RoomListResponse
     */
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

        //check city name or hotel_code
        $hotel_city = null;
        if($RoomListRequest->hotel_code != null && $RoomListRequest->hotel_code != "")
        {
            $hotel = $this->em->getRepository("HotelreserveBundle:hotelEntity")->find($RoomListRequest->hotel_code);
            if(!$hotel) return new RoomListResponse("hotel doesn't exist.",null);

            if($RoomListRequest->city != null && $RoomListRequest->city != "")
                if($hotel->getHotelCity()!=$RoomListRequest->city)
                    return new RoomListResponse("hotel isn't in that city.",null);

            $hotel_city = "hotel";
        }
        else
        {
            if($RoomListRequest->city != null && $RoomListRequest->city != "")
                $hotel_city = "city";
            else
                return new RoomListResponse("fill hotel_code or city",null);
        }

        $hotels = (
            $hotel_city == "city"?
            $this->findBestRooms($date,$RoomListRequest->days_count,$RoomListRequest->city,null):
            $this->findBestRooms($date,$RoomListRequest->days_count,null,$RoomListRequest->hotel_code)
        );

        return new RoomListResponse("Success",$hotels);
    }

    //-----------------------------------------------------------------------------
    /**
     * @param $input
     * @return PreReserveResponse
     */
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
            date_time_set($date,0,0,0);
        }catch(\Exception $ex){
            return new PreReserveResponse(null,null,null,"Date Not Valid");
        }

        //check hotel code
        $hotel = $this->em->getRepository("HotelreserveBundle:hotelEntity")->find($PreReserveRequest->hotel_code);
        if(!$hotel)
            return new PreReserveResponse(null,null,null,"hotel code not valid");

        //check room code
        if(!$PreReserveRequest->room_code || $PreReserveRequest->room_code <= 0)
            return new PreReserveResponse(null,null,null,"room code not valid");

        //check days count
        if(!$PreReserveRequest->days_count || $PreReserveRequest->days_count <= 0)
            return new PreReserveResponse(null,null,null,"days count not valid");

        //check extra capacity count
        if($PreReserveRequest->extra_capacity_count===null || $PreReserveRequest->extra_capacity_count < 0)
            return new PreReserveResponse(null,null,null,"extra capacity count not valid");

        //find best room
        $hotels = $this->findBestRooms($date,$PreReserveRequest->days_count,null,$PreReserveRequest->hotel_code,$PreReserveRequest->room_code);

        $room = null;
        if(count($hotels) == 1)
        {
            $selHotel = $hotels[0];
            $room = $selHotel->rooms[0];
        }
        //check room code
        if(!$room)
            return new PreReserveResponse(null,null,null,"room type in hotel not found");

        //create reserve
        $codePay = $this->createCodePay();
        $money = $room->price_main_capacity + $PreReserveRequest->extra_capacity_count * $hotel->getHotelAddRoomTtariff();
        $roomEntity = $this->em->getRepository("HotelreserveBundle:roomEntity")->find($room->id);

        $reserveEntity = new reserveEntity();
        $reserveEntity->setCustomerEntity($customer);
        $reserveEntity->setAgencyEntity($userAgency->getAgencyEntity());
        $reserveEntity->setDateInp($date);
        $reserveEntity->setMoney($money);
        $reserveEntity->setCountNight($PreReserveRequest->days_count);
        $reserveEntity->setDateCreate(new \DateTime());
        $reserveEntity->setCodePey($codePay);

        //update blanks to reserve
        foreach($room->days as $day)
        {
            $blankEntity = $this->em->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array(
                    "dateIN"=>$this->dateconvertor->ShamsiToMiladi($day->date),
                    "roomEntity" => $roomEntity
                ));
            $blankEntity->setStatus(1);
            $blankEntity->setReserveEntity($reserveEntity);
            $reserveEntity->addBlankEntitie($blankEntity);
        }

        $this->em->persist($reserveEntity);
        $this->em->flush();

        return new PreReserveResponse($money,$codePay,$customer->getId(),"Success",$room->id,$room->price_main_capacity);
    }

    //-----------------------------------------------------------------------------
    /**
     * @param $input
     * @return ReserveResponse
     */
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
        if($ReserveRequest->reserve_code == null || $ReserveRequest->reserve_code == "")
            return new ReserveResponse(null,null,"Reserve Code not Valid");

        $reserveEntity = $this->em->getRepository("HotelreserveBundle:reserveEntity")->findOneBy(array("CodePey"=>$ReserveRequest->reserve_code));
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

        //set voucher
        $voucher = $this->createVoucher();
        $reserveEntity->setVoucher($voucher);

        //create accounting
        $accountEntity = new accountEntity();
        $accountEntity->setAgencyEntity($reserveEntity->getAgencyEntity());
        $accountEntity->setCustomerEntity($reserveEntity->getCustomerEntity());
        $accountEntity->setDateTime(new \DateTime());
        $accountEntity->setHotelEntity($hotel);
        $accountEntity->setPrice($reserveEntity->getMoney());
        $accountEntity->setType(1);
        $accountEntity->setStockAgency($agencyBalance-$reserveEntity->getMoney());
        $accountEntity->setStockHotel($hotelBalance+$reserveEntity->getMoney());
        $accountEntity->setReserveEntity($reserveEntity);
        $reserveEntity->addAccountEntitie($accountEntity);
        $this->em->persist($accountEntity);
        $this->em->flush();

        return new ReserveResponse($voucher,$accountEntity->getStockAgency(),"Success");
    }

    //-----------------------------------------------------------------------------
    /**
     * @param $agency
     * @return \Hotel\reserveBundle\Entity\userEntity|null
     */
    private function getUserAgency($agency)
    {
        $user = $this->em->getRepository("HotelreserveBundle:userEntity")->findOneBy(array("username"=>$agency->username));
        if($user == null)return null;
        $encoder = $this->encoderFactory->getEncoder($user);
        return $encoder->isPasswordValid($user->getPassword(),$agency->password,$user->getSalt())?$user:null;
    }

    /**
     * @param array $hotels
     * @param roomEntity $roomEntity
     * @param array $prices
     * @param array $freeDaysBeside
     */
    private function addRoom(array &$hotels,roomEntity $roomEntity,array $prices,array $freeDaysBeside)
    {
//        HotelService::log("-------");
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

        $selRoomKey = null;
        foreach($selHotel->rooms as $key=>$room)
            if($room->code == $roomEntity->getRoomType()) $selRoomKey = $key;

        if($selRoomKey === null)
        {
//            HotelService::log("add room type (".
//                    "hotel:".$selHotel->code.",".
//                    "type:".$roomEntity->getRoomType().",".
//                    "room:".$roomEntity->getId().
//                ")");
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
                $roomEntity->getRoomType(),
                $this->roomTypes[$roomEntity->getRoomType()],
                $roomEntity->getRoomCapacity(),
                $roomEntity->getRoomAddCapacity(),
                $sumPrices,
                $days,
                $freeDaysBeside,
                $roomEntity->getId()
            );
        }
        else
        {
            //create array of days and sum of Tariffs
            $sumPrices = 0;
            $days = array();
            foreach ($prices as $day=>$price)
            {
                $days [] = new Day($day,$price);
                $sumPrices += $price;
            }

            $newRoom = new Room(
                $roomEntity->getRoomType(),
                $this->roomTypes[$roomEntity->getRoomType()],
                $roomEntity->getRoomCapacity(),
                $roomEntity->getRoomAddCapacity(),
                $sumPrices,
                $days,
                $freeDaysBeside,
                $roomEntity->getId()
            );

            $best = $this->bestRoomByFreeDayBeside($selHotel->rooms[$selRoomKey]->freeDaysBeside,$freeDaysBeside);
//            HotelService::log("best by free day(".
//                "hotel:".$selHotel->code.",".
//                "type:".$roomEntity->getRoomType().",".
//                "room:".$roomEntity->getId().
//                "):".$best);
            if($best == 1) $selHotel->rooms[$selRoomKey] = $newRoom;
            else if($best == 0)
            {
                $best = $this->bestRoomByMoney($selHotel->rooms[$selRoomKey]->price_main_capacity,$sumPrices);
//                HotelService::log("best by money   (".
//                    "hotel:".$selHotel->code.",".
//                    "type:".$roomEntity->getRoomType().",".
//                    "room:".$roomEntity->getId().
//                    "):".$best);
                if($best == 1) $selHotel->rooms[$selRoomKey] = $newRoom;
            }
        }
    }

    /**
     * @param array $RoomServiceFreeDays
     * @param array $RoomEntityFreeDays
     * @return int
     */
    private function bestRoomByFreeDayBeside(array $RoomServiceFreeDays,array $RoomEntityFreeDays)
    {
        $sumService= $RoomServiceFreeDays['before']+$RoomEntityFreeDays['after'];
        $sumEntity= $RoomEntityFreeDays['before']+$RoomEntityFreeDays['after'];

        if($sumService == 0 && $sumEntity == 0) return 0;
        if($sumService == 0) return -1;
        if($sumEntity  == 0) return 1;

        if( $RoomServiceFreeDays['before']==1 || $RoomServiceFreeDays['after']== 1)
        {
            if( $RoomEntityFreeDays['before']==1 || $RoomEntityFreeDays['after']==1)
            {
                if($sumService == 2) return 1;
                else if($sumEntity == 2) return -1;

                if($sumService>$sumEntity) return -1;
                else if($sumService<$sumEntity) return 1;
                else return 0;
            }
            else
                return 1;
        }
        else
        {
            if( $RoomEntityFreeDays['before']==1 || $RoomEntityFreeDays['after']== 1)
                return -1;
            else
            {
                if($sumService>$sumEntity) return -1;
                else if($sumService<$sumEntity) return 1;
                else return 0;
            }
        }
    }

    /**
     * @param int $RoomServicePrices
     * @param int $RoomEntityPrices
     * @return int
     */
    private function bestRoomByMoney($RoomServicePrices,$RoomEntityPrices)
    {
        if($RoomServicePrices>$RoomEntityPrices) return 1;
        if($RoomServicePrices<$RoomEntityPrices) return -1;
        return 0;
    }

    /**
     * @param roomEntity $roomEntity
     * @param \DateTime $from
     * @param int $count
     * @return array
     */
    private function getCountFreeDaysBeside(roomEntity $roomEntity,\DateTime $from,$count)
    {
        $day = clone $from;

        $before = 0;
        while (true)
        {
            $day->sub(new \DateInterval("P1D"));
            $prevBlank = $this->em->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("dateIN"=>$day,"roomEntity"=>$roomEntity));
            if($prevBlank == null || $prevBlank->getStatus()!= 0) break;
            else $before++;
            if($before>5) break;
        }

        $day = clone $from;
        $day->add(new \DateInterval("P".($count-1)."D"));

        $after = 0;
        while (true)
        {
            $day->add(new \DateInterval("P1D"));
            $prevBlank = $this->em->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("dateIN"=>$day,"roomEntity"=>$roomEntity));
            if($prevBlank == null || $prevBlank->getStatus()!= 0) break;
            else $after++;
            if($after>5) break;
        }

        return array("before"=>$before,"after"=>$after);
    }

    /**
     * @param blankEntity $firstBlank
     * @param \DateTime $firstday
     * @param int $countDays
     * @return array|null
     */
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

    /**
     * @param \DateTime $date
     * @param $dayCount
     * @param string $city
     * @param int $hotelCode
     * @param int $roomType
     * @return array
     */
    private function findBestRooms(\DateTime $date, $dayCount, $city=null, $hotelCode=null, $roomType=null)
    {
        $qb = $this->em->createQueryBuilder()
            -> select("b")
            ->from("HotelreserveBundle:blankEntity","b")
            ->innerJoin("b.roomEntity","r")
            ->innerJoin("r.hotelEntity","h")
            ->where("b.status = :status")->setParameter("status","0")
            ->andWhere("b.dateIN = :date")->setParameter("date",$date)
        ;

        if($roomType)
        {
            $qb->andWhere("r.room_type = :roomType")->setParameter("roomType",$roomType)
               ->andWhere("h.id = :hotel_code")->setParameter("hotel_code",$hotelCode);
        }
        elseif($hotelCode)
            $qb->andWhere("h.id = :hotel_code")->setParameter("hotel_code",$hotelCode);
        else
            $qb->andWhere("h.hotel_city LIKE :city")->setParameter("city",$city);

        $firstBlanks = $qb->getQuery()->getResult();

//        HotelService::log("==============================================");
//        HotelService::log("count firstBlanks: ".count($firstBlanks));
        $hotels = array();
        foreach($firstBlanks as $firstBlank)
        {
            $resPrices = $this->checkIsEmptyNextDays($firstBlank,$date, $dayCount);
            if($resPrices)
            {
                $freeDaysBeside = $this->getCountFreeDaysBeside($firstBlank->getRoomEntity(),$date,$dayCount);
                $this->addRoom($hotels,$firstBlank->getRoomEntity(),$resPrices,$freeDaysBeside);
            }
        }

        return $hotels;
    }

    /**
     * @return string
     */
    private function createCodePay()
    {
        $in = number_format (round(microtime(true) * 3000),0,'.','').rand(0,9);
        $out = '';
        do {
            $last = bcmod($in, 16);
            $out = dechex($last).$out;
            $in = bcdiv(bcsub($in, $last), 16);
        } while($in>0);
        return strtoupper($out);
    }

    /**
     * @return string
     */
    private function createVoucher()
    {
        $str = number_format (round(microtime(true) * 4000),0,'.','').rand(0,9);

        for ($i=0;$i<strlen($str);$i++)
            if(rand(1,4)==1) $str[$i]=chr(65+$str[$i]);

        return $str;
    }

    /**
     * @param string $message
     */
    static public function log($message)
    {
        $file= fopen(@"../app/logs/service.txt","a");
        fwrite($file,"[".date_format(new \DateTime(),"Y-m-d H:i:s")."] ".$message."\r\n");
    }

    /**
     * @param $objectFrom
     * @param $objectTo
     */
    static public function CopyObject($objectFrom,$objectTo)
    {
        foreach (get_object_vars($objectFrom) as $key => $value)
            $objectTo->$key = $value;
    }
} 