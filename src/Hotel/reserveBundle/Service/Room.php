<?php
namespace Hotel\reserveBundle\Service;

class Room
{
	/**
	 * The code
	 * @var int
	 */
	public $code;
	/**
	 * The type
	 * @var string
	 */
	public $type;
	/**
	 * The main_capacity
	 * @var int
	 */
	public $main_capacity;
	/**
	 * The extra_capacity
	 * @var int
	 */
	public $extra_capacity;
	/**
	 * The price_main_capacity
	 * @var int
	 */
	public $price_main_capacity;
	/**
	 * Constructor method for room
	 * @param int $_code
	 * @param string $_type
	 * @param int $_main_capacity
	 * @param int $_extra_capacity
	 * @param int $_price_main_capacity
	 * @return Room
	 */
	public function __construct($_code = NULL,$_type = NULL,$_main_capacity = NULL,$_extra_capacity = NULL,$_price_main_capacity = NULL)
	{
		$this->code=$_code;
		$this->type=$_type;
		$this->main_capacity=$_main_capacity;
		$this->extra_capacity=$_extra_capacity;
		$this->price_main_capacity=$_price_main_capacity;
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