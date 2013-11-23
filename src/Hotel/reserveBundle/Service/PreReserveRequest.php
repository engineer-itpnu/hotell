<?php
namespace Hotel\reserveBundle\Service;

class PreReserveRequest
{
	/**
	 * The hotel_code
	 * @var int
	 */
	public $hotel_code;
	/**
	 * The room_code
	 * @var int
	 */
	public $room_code;
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
	 * The extra_capacity_count
	 * @var int
	 */
	public $extra_capacity_count;
	/**
	 * The customer
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var CustomerInfo
	 */
	public $customer;
	/**
	 * The agency_info
	 * @var AgencyInfo
	 */
	public $agency_info;
	/**
	 * The customer_code
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $customer_code;
	/**
	 * Constructor method for pre_reserve_request
	 * @uses PreReserveRequest::setHotel_code()
	 * @uses PreReserveRequest::setRoom_code()
	 * @uses PreReserveRequest::setDate()
	 * @uses PreReserveRequest::setDays_count()
	 * @uses PreReserveRequest::setExtra_capacity_count()
	 * @uses PreReserveRequest::setCustomer()
	 * @uses PreReserveRequest::setAgency_info()
	 * @uses PreReserveRequest::setCustomer_code()
	 * @param int $_hotel_code
	 * @param int $_room_code
	 * @param string $_date
	 * @param int $_days_count
	 * @param int $_extra_capacity_count
	 * @param CustomerInfo $_customer
	 * @param AgencyInfo $_agency_info
	 * @param int $_customer_code
	 * @return PreReserveRequest
	 */
	public function __construct($_hotel_code = NULL,$_room_code = NULL,$_date = NULL,$_days_count = NULL,$_extra_capacity_count = NULL,$_customer = NULL,$_agency_info = NULL,$_customer_code = NULL)
	{
		$this->setHotel_code($_hotel_code);
		$this->setRoom_code($_room_code);
		$this->setDate($_date);
		$this->setDays_count($_days_count);
		$this->setExtra_capacity_count($_extra_capacity_count);
		$this->setCustomer($_customer);
		$this->setAgency_info($_agency_info);
		$this->setCustomer_code($_customer_code);
	}
	/**
	 * Get hotel_code value
	 * @return int|null
	 */
	public function getHotel_code()
	{
		return $this->hotel_code;
	}
	/**
	 * Set hotel_code value
	 * @param int $_hotel_code the hotel_code
	 * @return int
	 */
	public function setHotel_code($_hotel_code)
	{
		return ($this->hotel_code = $_hotel_code);
	}
	/**
	 * Get room_code value
	 * @return int|null
	 */
	public function getRoom_code()
	{
		return $this->room_code;
	}
	/**
	 * Set room_code value
	 * @param int $_room_code the room_code
	 * @return int
	 */
	public function setRoom_code($_room_code)
	{
		return ($this->room_code = $_room_code);
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
	 * Get extra_capacity_count value
	 * @return int|null
	 */
	public function getExtra_capacity_count()
	{
		return $this->extra_capacity_count;
	}
	/**
	 * Set extra_capacity_count value
	 * @param int $_extra_capacity_count the extra_capacity_count
	 * @return int
	 */
	public function setExtra_capacity_count($_extra_capacity_count)
	{
		return ($this->extra_capacity_count = $_extra_capacity_count);
	}
	/**
	 * Get customer value
	 * @return CustomerInfo|null
	 */
	public function getCustomer()
	{
		return $this->customer;
	}
	/**
	 * Set customer value
	 * @param CustomerInfo $_customer the customer
	 * @return CustomerInfo
	 */
	public function setCustomer($_customer)
	{
		return ($this->customer = $_customer);
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
	 * Get customer_code value
	 * @return int|null
	 */
	public function getCustomer_code()
	{
		return $this->customer_code;
	}
	/**
	 * Set customer_code value
	 * @param int $_customer_code the customer_code
	 * @return int
	 */
	public function setCustomer_code($_customer_code)
	{
		return ($this->customer_code = $_customer_code);
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