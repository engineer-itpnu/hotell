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

    public function ListRooms($input)
    {
        $RoomListRequest = new RoomListRequest();
        HotelService::CopyObject($input,$RoomListRequest);

        HotelService::log("city:".$RoomListRequest->city);
        HotelService::log("date:".$RoomListRequest->date);
        HotelService::log("days:".$RoomListRequest->days_count);
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

        if(!$this->checkUser($ReserveRequest->agency_info))
            return new ReserveResponse(null,null,"User Not Verify");

        HotelService::log("Reserve_code:".$ReserveRequest->reserve_code);
        HotelService::log("Username:".$ReserveRequest->agency_info->username);
        HotelService::log("Password:".$ReserveRequest->agency_info->password);
        return new ReserveResponse(10,1000,"True");
    }

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