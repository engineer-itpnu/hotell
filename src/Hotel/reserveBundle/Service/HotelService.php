<?php
namespace Hotel\reserveBundle\Service;

use Doctrine\ORM\EntityManager;
use Hotel\reserveBundle\Handler\DateConvertor;

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
     * @param DateConvertor $dc
     * @param EntityManager $em
     */
    public function __construct(DateConvertor $dc=null, EntityManager $em=null )
    {
        $this->dateconvertor = $dc;
        $this->em = $em;
    }

    public function ListRooms($input)
    {
        $RoomListRequest = new RoomListRequest();
        HotelService::CopyObject($input,$RoomListRequest);

        HotelService::log("city:".$RoomListRequest->getCity());
        HotelService::log("date:".$RoomListRequest->getDate());
        HotelService::log("days:".$RoomListRequest->getDays_count());
        HotelService::log("Username:".$RoomListRequest->getAgency_info()->getUsername());
        HotelService::log("Password:".$RoomListRequest->getAgency_info()->getPassword());
        return 12;
    }

    public function PreReserve($input)
    {
        $username = $input->Userinfo->UserName;
        $password = $input->Userinfo->Password;
        $roomid = $input->roomid;

        return "user: $username pass: $password roomid: $roomid ";
    }

    public function Reserve($input)
    {
        $ReserveRequest = new ReserveRequest();
        HotelService::CopyObject($input,$ReserveRequest);

        HotelService::log("Reserve_code:".$ReserveRequest->getReserve_code());
        HotelService::log("Username:".$ReserveRequest->getAgency_info()->getUsername());
        HotelService::log("Password:".$ReserveRequest->getAgency_info()->getPassword());
        return 12;
    }

    static public function log($message)
    {
        $file= fopen(@"../app/logs/service.txt","a");
        fwrite($file,"[".date_format(new \DateTime(),"Y-m-d H:i:s")."] ".$message."\r\n");
    }

    public static function CopyObject($objectFrom,$objectTo)
    {
        foreach (get_object_vars($objectFrom) as $key => $value) {
            if(is_object($value))
                HotelService::CopyObject($value,$objectTo->$key);
            else
                $objectTo->$key = $value;
        }
    }
} 