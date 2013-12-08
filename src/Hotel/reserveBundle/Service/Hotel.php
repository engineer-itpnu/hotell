<?php
namespace Hotel\reserveBundle\Service;

class Hotel
{
	/**
	 * The code
	 * @var int
	 */
	public $code;
	/**
	 * The name
	 * @var string
	 */
	public $name;
	/**
	 * The rate
	 * @var int
	 */
	public $rate;
	/**
	 * The phone
	 * @var string
	 */
	public $phone;
	/**
	 * The extra_capacity_tariff
	 * @var int
	 */
	public $extra_capacity_tariff;
	/**
	 * The rooms
	 * Meta informations extracted from the WSDL
	 * - maxOccurs : unbounded
	 * @var Hotel
	 */
	public $rooms;
	/**
	 * Constructor method for hotel
	 * @param int $_code
	 * @param string $_name
	 * @param int $_rate
	 * @param string $_phone
	 * @param int $_extra_capacity_tariff
	 * @param array $_rooms
	 * @return Hotel
	 */
	public function __construct($_code = NULL,$_name = NULL,$_rate = NULL,$_phone = NULL,$_extra_capacity_tariff = NULL,$_rooms = NULL)
	{
		$this->code=$_code;
		$this->name=$_name;
		$this->rate=$_rate;
		$this->phone=$_phone;
		$this->extra_capacity_tariff=$_extra_capacity_tariff;
		$this->rooms=$_rooms?$_rooms:array();
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