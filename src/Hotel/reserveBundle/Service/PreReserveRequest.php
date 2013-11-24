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
		$this->hotel_code=$_hotel_code;
		$this->room_code=$_room_code;
		$this->date=$_date;
		$this->days_count=$_days_count;
		$this->extra_capacity_count=$_extra_capacity_count;
		$this->customer=$_customer?$_customer:new CustomerInfo();
		$this->agency_info=$_agency_info?$_agency_info:new AgencyInfo();
		$this->customer_code=$_customer_code;
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