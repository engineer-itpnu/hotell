<?php
namespace Hotel\reserveBundle\Service;

class RoomListResponse
{
	/**
	 * The status
	 * @var string
	 */
	public $status;
	/**
	 * The hotels
	 * Meta informations extracted from the WSDL
	 * - maxOccurs : unbounded
	 * - minOccurs : 0
	 * @var Hotel
	 */
	public $hotels;
	/**
	 * Constructor method for room_list_response
	 * @uses RoomListResponse::setStatus()
	 * @uses RoomListResponse::setHotels()
	 * @param string $_status
	 * @param Hotel $_hotels
	 * @return RoomListResponse
	 */
	public function __construct($_status = NULL,$_hotels = NULL)
	{
		$this->setStatus($_status);
		$this->setHotels($_hotels?$_hotels:new Hotel());
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
	 * Get hotels value
	 * @return Hotel|null
	 */
	public function getHotels()
	{
		return $this->hotels;
	}
	/**
	 * Set hotels value
	 * @param Hotel $_hotels the hotels
	 * @return Hotel
	 */
	public function setHotels($_hotels)
	{
		return ($this->hotels = $_hotels);
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