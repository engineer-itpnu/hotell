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
     * The hotel_code
     * @var int
     */
    public $hotel_code;
	/**
	 * Constructor method for room_list_request
	 * @param string $_date
	 * @param int $_days_count
	 * @param string $_city
	 * @param AgencyInfo $_agency_info
     * @param string $_hotel_code
	 * @return RoomListRequest
	 */
	public function __construct($_date = NULL,$_days_count = NULL,$_city = NULL,$_agency_info = NULL,$_hotel_code = NULL)
	{
		$this->date=$_date;
		$this->days_count=$_days_count;
		$this->city=$_city;
		$this->agency_info=$_agency_info?$_agency_info:new AgencyInfo();
        $this->hotel_code=$_hotel_code;
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