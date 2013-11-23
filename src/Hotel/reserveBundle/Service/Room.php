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
	 * @uses Room::setCode()
	 * @uses Room::setType()
	 * @uses Room::setMain_capacity()
	 * @uses Room::setExtra_capacity()
	 * @uses Room::setPrice_main_capacity()
	 * @param int $_code
	 * @param string $_type
	 * @param int $_main_capacity
	 * @param int $_extra_capacity
	 * @param int $_price_main_capacity
	 * @return Room
	 */
	public function __construct($_code = NULL,$_type = NULL,$_main_capacity = NULL,$_extra_capacity = NULL,$_price_main_capacity = NULL)
	{
		$this->setCode($_code);
		$this->setType($_type);
		$this->setMain_capacity($_main_capacity);
		$this->setExtra_capacity($_extra_capacity);
		$this->setPrice_main_capacity($_price_main_capacity);
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
	 * Get type value
	 * @return string|null
	 */
	public function getType()
	{
		return $this->type;
	}
	/**
	 * Set type value
	 * @param string $_type the type
	 * @return string
	 */
	public function setType($_type)
	{
		return ($this->type = $_type);
	}
	/**
	 * Get main_capacity value
	 * @return int|null
	 */
	public function getMain_capacity()
	{
		return $this->main_capacity;
	}
	/**
	 * Set main_capacity value
	 * @param int $_main_capacity the main_capacity
	 * @return int
	 */
	public function setMain_capacity($_main_capacity)
	{
		return ($this->main_capacity = $_main_capacity);
	}
	/**
	 * Get extra_capacity value
	 * @return int|null
	 */
	public function getExtra_capacity()
	{
		return $this->extra_capacity;
	}
	/**
	 * Set extra_capacity value
	 * @param int $_extra_capacity the extra_capacity
	 * @return int
	 */
	public function setExtra_capacity($_extra_capacity)
	{
		return ($this->extra_capacity = $_extra_capacity);
	}
	/**
	 * Get price_main_capacity value
	 * @return int|null
	 */
	public function getPrice_main_capacity()
	{
		return $this->price_main_capacity;
	}
	/**
	 * Set price_main_capacity value
	 * @param int $_price_main_capacity the price_main_capacity
	 * @return int
	 */
	public function setPrice_main_capacity($_price_main_capacity)
	{
		return ($this->price_main_capacity = $_price_main_capacity);
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