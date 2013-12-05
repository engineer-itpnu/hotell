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
	 * The price_main_capacity
	 * @var int
	 */
	public $price_main_capacity;
    /**
     * The days
     * Meta informations extracted from the WSDL
     * - maxOccurs : unbounded
     * @var Room
     */
    public $days;
	/**
	 * Constructor method for room
	 * @param int $_code
	 * @param string $_type
	 * @param int $_price_main_capacity
     * @param array $_days
	 * @return Room
	 */
	public function __construct($_code = NULL,$_type = NULL,$_price_main_capacity = NULL,$_days = NULL)
	{
		$this->code=$_code;
		$this->type=$_type;
		$this->price_main_capacity=$_price_main_capacity;
        $this->days=$_days?$_days:array();
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