<?php
namespace Hotel\reserveBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
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

        if(!$this->checkUser($PreReserveRequest->agency_info))
            return new PreReserveResponse(null,null,null,"User Not Verified");

        HotelService::log("hotel:".$PreReserveRequest->hotel_code);
        HotelService::log("room:".$PreReserveRequest->room_code);
        HotelService::log("date:".$PreReserveRequest->date);
        HotelService::log("days:".$PreReserveRequest->days_count);
        HotelService::log("extra capacity:".$PreReserveRequest->extra_capacity_count);
        HotelService::log("customer:".$PreReserveRequest->customer_code);
        HotelService::log("Username:".$PreReserveRequest->agency_info->username);
        HotelService::log("Password:".$PreReserveRequest->agency_info->password);

        return new PreReserveResponse(null,null,null,"Success");
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
        return $encoder->isPasswordValid($user->getPassword(),$agency->password,$user->getSalt());
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