<?php

namespace Hotel\reserveBundle\Handler;

use CybersExperts\Bundle\JalaliDateBundle\Service\DateConverter;

class DateConvertor {

    private $dateconvertor;
    public function __construct(DateConverter $dateconvertor)
    {
        $this->dateconvertor = $dateconvertor;
    }

    public function ShamsiToMiladi($shamsi = "")
    {
        if($shamsi == null || $shamsi == "")
            return null;

        $shamsiarray = explode("/",$shamsi);
        $miladiarray = $this->dateconvertor->jalaliToGregorian($shamsiarray[0],$shamsiarray[1],$shamsiarray[2]);
        return date_create_from_format("Y/m/d",$miladiarray[0]."/".$miladiarray[1]."/".$miladiarray[2]);
    }

    public function MiladiToShamsi(\DateTime $miladi = null)
    {
        if($miladi == null)
            return "";

        $miladiarray = date_parse(date_format($miladi,"Y/m/d"));
        $shamsiarray = $this->dateconvertor->gregorianToJalali($miladiarray['year'],$miladiarray['month'],$miladiarray['day']);
        return $shamsiarray[0]."/".$shamsiarray[1]."/".$shamsiarray[2];
    }
}