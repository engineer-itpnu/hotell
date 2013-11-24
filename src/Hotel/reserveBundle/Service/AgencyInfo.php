<?php
namespace Hotel\reserveBundle\Service;

class AgencyInfo
{
	/**
	 * The username
	 * @var string
	 */
	public $username;
	/**
	 * The password
	 * @var string
	 */
	public $password;
	/**
	 * Constructor method for agency_info
	 * @param string $_username
	 * @param string $_password
	 * @return AgencyInfo
	 */
	public function __construct($_username = NULL,$_password = NULL)
	{
		$this->username = $_username;
		$this->password = $_password;
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