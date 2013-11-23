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
	 * @uses Agency_info::setUsername()
	 * @uses Agency_info::setPassword()
	 * @param string $_username
	 * @param string $_password
	 * @return AgencyInfo
	 */
	public function __construct($_username = NULL,$_password = NULL)
	{
		$this->setUsername($_username);
		$this->setPassword($_password);
	}
	/**
	 * Get username value
	 * @return string|null
	 */
	public function getUsername()
	{
		return $this->username;
	}
	/**
	 * Set username value
	 * @param string $_username the username
	 * @return string
	 */
	public function setUsername($_username)
	{
		return ($this->username = $_username);
	}
	/**
	 * Get password value
	 * @return string|null
	 */
	public function getPassword()
	{
		return $this->password;
	}
	/**
	 * Set password value
	 * @param string $_password the password
	 * @return string
	 */
	public function setPassword($_password)
	{
		return ($this->password = $_password);
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