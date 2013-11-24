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
	 * @param string $_status
	 * @param Hotel $_hotels
	 * @return RoomListResponse
	 */
	public function __construct($_status = NULL,$_hotels = NULL)
	{
		$this->status=$_status;
		$this->hotels=$_hotels?$_hotels:new Hotel();
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