<?php
namespace Hotel\reserveBundle\Service;

class CustomerInfo
{
	/**
	 * The first_name
	 * @var string
	 */
	public $first_name;
	/**
	 * The last_name
	 * @var string
	 */
	public $last_name;
	/**
	 * The email
	 * @var string
	 */
	public $email;
	/**
	 * The phone
	 * @var string
	 */
	public $phone;
	/**
	 * The mobile
	 * @var string
	 */
	public $mobile;
	/**
	 * Constructor method for customer_info
	 * @uses CustomerInfo::setFirst_name()
	 * @uses CustomerInfo::setLast_name()
	 * @uses CustomerInfo::setEmail()
	 * @uses CustomerInfo::setPhone()
	 * @uses CustomerInfo::setMobile()
	 * @param string $_first_name
	 * @param string $_last_name
	 * @param string $_email
	 * @param string $_phone
	 * @param string $_mobile
	 * @return CustomerInfo
	 */
	public function __construct($_first_name = NULL,$_last_name = NULL,$_email = NULL,$_phone = NULL,$_mobile = NULL)
	{
		$this->setFirst_name($_first_name);
		$this->setLast_name($_last_name);
		$this->setEmail($_email);
		$this->setPhone($_phone);
		$this->setMobile($_mobile);
	}
	/**
	 * Get first_name value
	 * @return string|null
	 */
	public function getFirst_name()
	{
		return $this->first_name;
	}
	/**
	 * Set first_name value
	 * @param string $_first_name the first_name
	 * @return string
	 */
	public function setFirst_name($_first_name)
	{
		return ($this->first_name = $_first_name);
	}
	/**
	 * Get last_name value
	 * @return string|null
	 */
	public function getLast_name()
	{
		return $this->last_name;
	}
	/**
	 * Set last_name value
	 * @param string $_last_name the last_name
	 * @return string
	 */
	public function setLast_name($_last_name)
	{
		return ($this->last_name = $_last_name);
	}
	/**
	 * Get email value
	 * @return string|null
	 */
	public function getEmail()
	{
		return $this->email;
	}
	/**
	 * Set email value
	 * @param string $_email the email
	 * @return string
	 */
	public function setEmail($_email)
	{
		return ($this->email = $_email);
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
	 * Get mobile value
	 * @return string|null
	 */
	public function getMobile()
	{
		return $this->mobile;
	}
	/**
	 * Set mobile value
	 * @param string $_mobile the mobile
	 * @return string
	 */
	public function setMobile($_mobile)
	{
		return ($this->mobile = $_mobile);
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