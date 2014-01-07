<?php
namespace Hotel\reserveBundle\Service;

class ReserveInfoRequest
{
    /**
     * The code
     * @var string
     */
    public $code;
    /**
     * The agency_info
     * @var AgencyInfo
     */
    public $agency_info;
    /**
     * Constructor method for reserve_info_request
     * @param string $_code
     * @param AgencyInfo $_agency_info
     * @return ReserveInfoRequest
     */
    public function __construct($_code = NULL,$_agency_info = NULL)
    {
        $this->code=$_code;
        $this->agency_info=$_agency_info?$_agency_info:new AgencyInfo();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}