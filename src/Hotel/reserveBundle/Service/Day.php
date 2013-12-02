<?php
namespace Hotel\reserveBundle\Service;

class Day
{
	/**
	 * The type
	 * @var string
	 */
	public $date;
	/**
	 * The main_capacity
	 * @var int
	 */
	public $tariff;
	/**
	 * Constructor method for room
	 * @param string $_date
	 * @param int $_tariff
	 * @return Day
	 */
	public function __construct($_date = NULL,$_tariff = NULL)
	{
		$this->date=$_date;
		$this->tariff=$_tariff;
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
