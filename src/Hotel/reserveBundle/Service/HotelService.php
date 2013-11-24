<?php
namespace Hotel\reserveBundle\Service;

use Doctrine\ORM\EntityManager;
use Hotel\reserveBundle\Entity\customerEntity;
use Hotel\reserveBundle\Entity\reserveEntity;
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

        if(!$this->checkUser($RoomListRequest->agency_info))
            return new RoomListResponse("User Not Verified",null);

        HotelService::log("city:".$RoomListRequest->city);
        HotelService::log("date:".$RoomListRequest->date);
        HotelService::log("days:".$RoomListRequest->days_count);
        HotelService::log("Username:".$RoomListRequest->agency_info->username);
        HotelService::log("Password:".$RoomListRequest->agency_info->password);

        return new RoomListResponse("Success",null);
    }

    //-----------------------------------------------------------------------------
    public function PreReserve($input)
    {
        $PreReserveRequest = new PreReserveRequest();
        HotelService::CopyObject($input,$PreReserveRequest);

        //get user Agency
        $userAgency = $this->checkUser($PreReserveRequest->agency_info);
        if(!$userAgency)
            return new PreReserveResponse(null,null,null,"User Not Verified");

        if(!$userAgency->hasRole("ROLE_AGENCY") || !$userAgency->getAgencyEntity())
            return new PreReserveResponse(null,null,null,"User is not Agency");

        //get Customer
        $customer = $this->em->getRepository("HotelreserveBundle:customerEntity")->find($PreReserveRequest->customer_code);
        if ($customer == null)
        {
            HotelService::log("customer_code is null");
            $customerReq = $PreReserveRequest->customer;
            if($customerReq == null)
                return new PreReserveResponse(null,null,null,"Customer is Empty");
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

        if(!$this->checkUser($ReserveRequest->agency_info))
            return new ReserveResponse(null,null,"User Not Verified");

        HotelService::log("Reserve_code:".$ReserveRequest->reserve_code);
        HotelService::log("Username:".$ReserveRequest->agency_info->username);
        HotelService::log("Password:".$ReserveRequest->agency_info->password);

        return new ReserveResponse(null,null,"Success");
    }

    //-----------------------------------------------------------------------------
    private function checkUser($agency)
    {
        $user = $this->em->getRepository("HotelreserveBundle:userEntity")->findOneBy(array("username"=>$agency->username));
        if($user == null)return false;
        $encoder = $this->encoderFactory->getEncoder($user);
        return $encoder->isPasswordValid($user->getPassword(),$agency->password,$user->getSalt())?$user:false;
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