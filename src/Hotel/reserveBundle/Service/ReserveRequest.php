<?php
namespace Hotel\reserveBundle\Service;

class ReserveRequest
{
	/**
	 * The reserve_code
	 * @var string
	 */
	public $reserve_code;
	/**
	 * The agency_info
	 * @var AgencyInfo
	 */
	public $agency_info;
	/**
	 * Constructor method for reserve_request
	 * @param string $_reserve_code
	 * @param AgencyInfo $_agency_info
	 * @return ReserveRequest
	 */
	public function __construct($_reserve_code = NULL,$_agency_info = NULL)
	{
		$this->reserve_code=$_reserve_code;
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