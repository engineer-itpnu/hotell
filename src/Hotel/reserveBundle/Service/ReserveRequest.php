<?php
namespace Hotel\reserveBundle\Service;

class ReserveRequest
{
	/**
	 * The reserve_code
	 * @var int
	 */
	public $reserve_code;
	/**
	 * The agency_info
	 * @var AgencyInfo
	 */
	public $agency_info;
	/**
	 * Constructor method for reserve_request
	 * @uses ReserveRequest::setReserve_code()
	 * @uses ReserveRequest::setAgency_info()
	 * @param int $_reserve_code
	 * @param AgencyInfo $_agency_info
	 * @return ReserveRequest
	 */
	public function __construct($_reserve_code = NULL,$_agency_info = NULL)
	{
		$this->setReserve_code($_reserve_code);
		$this->setAgency_info($_agency_info?$_agency_info:new AgencyInfo());
	}
	/**
	 * Get reserve_code value
	 * @return int|null
	 */
	public function getReserve_code()
	{
		return $this->reserve_code;
	}
	/**
	 * Set reserve_code value
	 * @param int $_reserve_code the reserve_code
	 * @return int
	 */
	public function setReserve_code($_reserve_code)
	{
		return ($this->reserve_code = $_reserve_code);
	}
	/**
	 * Get agency_info value
	 * @return AgencyInfo|null
	 */
	public function getAgency_info()
	{
		return $this->agency_info;
	}
	/**
	 * Set agency_info value
	 * @param AgencyInfo $_agency_info the agency_info
	 * @return AgencyInfo
	 */
	public function setAgency_info($_agency_info)
	{
		return ($this->agency_info = $_agency_info);
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