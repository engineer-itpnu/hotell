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

        ini_set("log_errors", 1);
        ini_set("error_log", @"C:/xampp/htdocs/hotellre/web/log.txt");
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
//        $r = $input->reserve_code;
//        $this->log($r);
        $a = new ReserveRequest($input);

        ob_start();
        var_dump($a);
        $this->log(ob_get_clean());
        return 12;
    }

    private function log($message)
    {
        $file= fopen(@"log.txt","a");
        fwrite($file,date_format(new \DateTime(),"Y/m/d H:i:s")." :: ".$message."\r\n");
    }

//$in = $this->cast("ReserveRequest",$input);
//    private function cast($destination, $sourceObject)
//    {
//        if (is_string($destination)) {
//            $destination = new $destination();
//        }
//        $sourceReflection = new \ReflectionObject($sourceObject);
//        $destinationReflection = new \ReflectionObject($destination);
//        $sourceProperties = $sourceReflection->getProperties();
//        foreach ($sourceProperties as $sourceProperty) {
//            $sourceProperty->setAccessible(true);
//            $name = $sourceProperty->getName();
//            $value = $sourceProperty->getValue($sourceObject);
//            if ($destinationReflection->hasProperty($name)) {
//                $propDest = $destinationReflection->getProperty($name);
//                $propDest->setAccessible(true);
//                $propDest->setValue($destination,$value);
//            } else {
//                $destination->$name = $value;
//            }
//        }
//        return $destination;
//    }
} 