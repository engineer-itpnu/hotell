<?php
namespace Hotel\reserveBundle\Service;

class PreReserveResponse
{
	/**
	 * The final_price
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $final_price;
	/**
	 * The reserve_code
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $reserve_code;
	/**
	 * The customer_code
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $customer_code;
	/**
	 * The status
	 * @var string
	 */
	public $status;
	/**
	 * Constructor method for pre_reserve_response
	 * @uses PreReserveResponse::setFinal_price()
	 * @uses PreReserveResponse::setReserve_code()
	 * @uses PreReserveResponse::setCustomer_code()
	 * @uses PreReserveResponse::setStatus()
	 * @param int $_final_price
	 * @param int $_reserve_code
	 * @param int $_customer_code
	 * @param string $_status
	 * @return PreReserveResponse
	 */
	public function __construct($_final_price = NULL,$_reserve_code = NULL,$_customer_code = NULL,$_status = NULL)
	{
		$this->setFinal_price($_final_price);
		$this->setReserve_code($_reserve_code);
		$this->setCustomer_code($_customer_code);
		$this->setStatus($_status);
	}
	/**
	 * Get final_price value
	 * @return int|null
	 */
	public function getFinal_price()
	{
		return $this->final_price;
	}
	/**
	 * Set final_price value
	 * @param int $_final_price the final_price
	 * @return int
	 */
	public function setFinal_price($_final_price)
	{
		return ($this->final_price = $_final_price);
	}
	/**
	 * Get reserve_code value
	 * @return int|null
	 */
	public function getReserve_code()
	{
		return $this->reserve_code;
	}
	/**
	 * Set reserve_code value
	 * @param int $_reserve_code the reserve_code
	 * @return int
	 */
	public function setReserve_code($_reserve_code)
	{
		return ($this->reserve_code = $_reserve_code);
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
	 * Get status value
	 * @return string|null
	 */
	public function getStatus()
	{
		return $this->status;
	}
	/**
	 * Set status value
	 * @param string $_status the status
	 * @return string
	 */
	public function setStatus($_status)
	{
		return ($this->status = $_status);
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