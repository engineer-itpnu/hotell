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
	 * @uses RoomListRequest::setDate()
	 * @uses RoomListRequest::setDays_count()
	 * @uses RoomListRequest::setCity()
	 * @uses RoomListRequest::setAgency_info()
	 * @param string $_date
	 * @param int $_days_count
	 * @param string $_city
	 * @param AgencyInfo $_agency_info
	 * @return RoomListRequest
	 */
	public function __construct($_date = NULL,$_days_count = NULL,$_city = NULL,$_agency_info = NULL)
	{
		$this->setDate($_date);
		$this->setDays_count($_days_count);
		$this->setCity($_city);
		$this->setAgency_info($_agency_info);
	}
	/**
	 * Get date value
	 * @return string|null
	 */
	public function getDate()
	{
		return $this->date;
	}
	/**
	 * Set date value
	 * @param string $_date the date
	 * @return string
	 */
	public function setDate($_date)
	{
		return ($this->date = $_date);
	}
	/**
	 * Get days_count value
	 * @return int|null
	 */
	public function getDays_count()
	{
		return $this->days_count;
	}
	/**
	 * Set days_count value
	 * @param int $_days_count the days_count
	 * @return int
	 */
	public function setDays_count($_days_count)
	{
		return ($this->days_count = $_days_count);
	}
	/**
	 * Get city value
	 * @return string|null
	 */
	public function getCity()
	{
		return $this->city;
	}
	/**
	 * Set city value
	 * @param string $_city the city
	 * @return string
	 */
	public function setCity($_city)
	{
		return ($this->city = $_city);
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