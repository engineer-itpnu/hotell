<?php
namespace Hotel\reserveBundle\Service;

use Hotel\reserveBundle\Handler\DateConvertor;

class HotelService {

    /**
     * @var DateConvertor
     */
    private $dateconvertor;

    /**
     * @param DateConvertor $dc
     */
    public function __construct(DateConvertor $dc)
    {
        $this->dateconvertor = $dc;
    }

    public function ListRooms($input)
    {
        $username = $input->Userinfo->UserName;
        $password = $input->Userinfo->Password;
        $roomid = $input->roomid;

        return "user: $username pass: $password roomid: $roomid ";
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
        $username = $input->Userinfo->UserName;
        $password = $input->Userinfo->Password;
        $roomid = $input->roomid;

        return "user: $username pass: $password roomid: $roomid ";
    }
} 