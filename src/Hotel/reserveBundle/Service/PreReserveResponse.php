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
	 * @var string
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
	 * @param int $_final_price
	 * @param string $_reserve_code
	 * @param int $_customer_code
	 * @param string $_status
	 * @return PreReserveResponse
	 */
	public function __construct($_final_price = NULL,$_reserve_code = NULL,$_customer_code = NULL,$_status = NULL)
	{
		$this->final_price=$_final_price;
		$this->reserve_code=$_reserve_code;
		$this->customer_code=$_customer_code;
		$this->status=$_status;
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