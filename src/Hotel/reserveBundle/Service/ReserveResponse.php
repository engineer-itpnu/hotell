<?php
namespace Hotel\reserveBundle\Service;

class ReserveResponse
{
	/**
	 * The reserve_accept_code
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $reserve_accept_code;
	/**
	 * The balance
	 * Meta informations extracted from the WSDL
	 * - minOccurs : 0
	 * @var int
	 */
	public $balance;
	/**
	 * The status
	 * @var string
	 */
	public $status;
	/**
	 * Constructor method for reserve_response
	 * @param int $_reserve_accept_code
	 * @param int $_balance
	 * @param string $_status
	 * @return ReserveResponse
	 */
	public function __construct($_reserve_accept_code = NULL,$_balance = NULL,$_status = NULL)
	{
		$this->reserve_accept_code=$_reserve_accept_code;
		$this->balance=$_balance;
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