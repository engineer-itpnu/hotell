<?php

namespace Hotel\reserveBundle\Handler;

use CybersExperts\Bundle\JalaliDateBundle\Service\DateConverter;
use CybersExperts\Bundle\JalaliDateBundle\Service\JalaliDateTime;

class DateConvertor {

    private $dateconvertor;
    private $jalaliDateTime;
    public function __construct(DateConverter $dateconvertor, JalaliDateTime $jdatetime)
    {
        $this->dateconvertor = $dateconvertor;
        $this->jalaliDateTime = $jdatetime;
    }

    public function ShamsiToMiladi($shamsi = "")
    {
        if($shamsi == null || $shamsi == "")
            return null;

        $shamsiarray = explode("/",$shamsi);
        $miladiarray = $this->dateconvertor->jalaliToGregorian($shamsiarray[0],$shamsiarray[1],$shamsiarray[2]);

        if($shamsiarray[1]>6 && $shamsiarray[2]>30) return null;
        if($shamsiarray[1]==12 && $shamsiarray[2]>29 && !$this->jalaliDateTime->isLeapYear($shamsiarray[0])) return null;

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

    public function isLeap($year)
    {
        return $this->jalaliDateTime->isLeapYear($year);
    }
}