<?php
namespace Hotel\reserveBundle\Service;

class RoomListRequest
{
	/**
	 * The date
	 * @var string
	 */
	public $date;
	/**
	 * The days_count
	 * @var int
	 */
	public $days_count;
	/**
	 * The city
	 * @var string
	 */
	public $city;
	/**
	 * The agency_info
	 * @var AgencyInfo
	 */
	public $agency_info;
	/**
	 * Constructor method for room_list_request
	 * @param string $_date
	 * @param int $_days_count
	 * @param string $_city
	 * @param AgencyInfo $_agency_info
	 * @return RoomListRequest
	 */
	public function __construct($_date = NULL,$_days_count = NULL,$_city = NULL,$_agency_info = NULL)
	{
		$this->date=$_date;
		$this->days_count=$_days_count;
		$this->city=$_city;
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