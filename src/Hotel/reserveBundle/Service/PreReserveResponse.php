<?php
namespace Hotel\reserveBundle\Service;

class PreReserveResponse
{
    /**
     * The room_code
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * @var int
     */
    public $room_code;
    /**
     * The main_price
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * @var int
     */
    public $main_price;
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
     * @param int $_room_code
     * @param int $_main_price
	 * @return PreReserveResponse
	 */
	public function __construct($_final_price = NULL,$_reserve_code = NULL,$_customer_code = NULL,$_status = NULL,$_room_code = NULL,$_main_price = NULL)
	{
        $this->room_code=$_room_code;
        $this->main_price=$_main_price;
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