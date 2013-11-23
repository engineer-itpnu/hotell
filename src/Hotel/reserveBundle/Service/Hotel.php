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
	 * @uses Hotel::setCode()
	 * @uses Hotel::setName()
	 * @uses Hotel::setRate()
	 * @uses Hotel::setPhone()
	 * @uses Hotel::setExtra_capacity_tariff()
	 * @uses Hotel::setRooms()
	 * @param int $_code
	 * @param string $_name
	 * @param int $_rate
	 * @param string $_phone
	 * @param int $_extra_capacity_tariff
	 * @param Room $_rooms
	 * @return Hotel
	 */
	public function __construct($_code = NULL,$_name = NULL,$_rate = NULL,$_phone = NULL,$_extra_capacity_tariff = NULL,$_rooms = NULL)
	{
		$this->setCode($_code);
		$this->setName($_name);
		$this->setRate($_rate);
		$this->setPhone($_phone);
		$this->setExtra_capacity_tariff($_extra_capacity_tariff);
		$this->setRooms($_rooms?$_rooms:new Room());
	}
	/**
	 * Get code value
	 * @return int|null
	 */
	public function getCode()
	{
		return $this->code;
	}
	/**
	 * Set code value
	 * @param int $_code the code
	 * @return int
	 */
	public function setCode($_code)
	{
		return ($this->code = $_code);
	}
	/**
	 * Get name value
	 * @return string|null
	 */
	public function getName()
	{
		return $this->name;
	}
	/**
	 * Set name value
	 * @param string $_name the name
	 * @return string
	 */
	public function setName($_name)
	{
		return ($this->name = $_name);
	}
	/**
	 * Get rate value
	 * @return int|null
	 */
	public function getRate()
	{
		return $this->rate;
	}
	/**
	 * Set rate value
	 * @param int $_rate the rate
	 * @return int
	 */
	public function setRate($_rate)
	{
		return ($this->rate = $_rate);
	}
	/**
	 * Get phone value
	 * @return string|null
	 */
	public function getPhone()
	{
		return $this->phone;
	}
	/**
	 * Set phone value
	 * @param string $_phone the phone
	 * @return string
	 */
	public function setPhone($_phone)
	{
		return ($this->phone = $_phone);
	}
	/**
	 * Get extra_capacity_tariff value
	 * @return int|null
	 */
	public function getExtra_capacity_tariff()
	{
		return $this->extra_capacity_tariff;
	}
	/**
	 * Set extra_capacity_tariff value
	 * @param int $_extra_capacity_tariff the extra_capacity_tariff
	 * @return int
	 */
	public function setExtra_capacity_tariff($_extra_capacity_tariff)
	{
		return ($this->extra_capacity_tariff = $_extra_capacity_tariff);
	}
	/**
	 * Get rooms value
	 * @return Room|null
	 */
	public function getRooms()
	{
		return $this->rooms;
	}
	/**
	 * Set rooms value
	 * @param Room $_rooms the rooms
	 * @return Room
	 */
	public function setRooms($_rooms)
	{
		return ($this->rooms = $_rooms);
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