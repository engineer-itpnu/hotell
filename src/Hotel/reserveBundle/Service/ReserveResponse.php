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
	 * @uses ReserveResponse::setReserve_accept_code()
	 * @uses ReserveResponse::setBalance()
	 * @uses ReserveResponse::setStatus()
	 * @param int $_reserve_accept_code
	 * @param int $_balance
	 * @param string $_status
	 * @return ReserveResponse
	 */
	public function __construct($_reserve_accept_code = NULL,$_balance = NULL,$_status = NULL)
	{
		$this->setReserve_accept_code($_reserve_accept_code);
		$this->setBalance($_balance);
		$this->setStatus($_status);
	}
	/**
	 * Get reserve_accept_code value
	 * @return int|null
	 */
	public function getReserve_accept_code()
	{
		return $this->reserve_accept_code;
	}
	/**
	 * Set reserve_accept_code value
	 * @param int $_reserve_accept_code the reserve_accept_code
	 * @return int
	 */
	public function setReserve_accept_code($_reserve_accept_code)
	{
		return ($this->reserve_accept_code = $_reserve_accept_code);
	}
	/**
	 * Get balance value
	 * @return int|null
	 */
	public function getBalance()
	{
		return $this->balance;
	}
	/**
	 * Set balance value
	 * @param int $_balance the balance
	 * @return int
	 */
	public function setBalance($_balance)
	{
		return ($this->balance = $_balance);
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