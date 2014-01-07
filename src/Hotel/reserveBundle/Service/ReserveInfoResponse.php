<?php
namespace Hotel\reserveBundle\Service;

class ReserveInfoResponse
{
    /**
     * The status
     * @var string
     */
    public $status;
    /**
     * The reserve_status
     * @var string
     */
    public $reserve_status;
    /**
     * The insert_date
     * @var string
     */
    public $insert_date;
    /**
     * The in_date
     * @var string
     */
    public $in_date;
    /**
     * The days_count
     * @var int
     */
    public $days_count;
    /**
     * The final_price
     * @var int
     */
    public $final_price;
    /**
     * The city
     * @var string
     */
    public $city;
    /**
     * The customer
     * @var CustomerInfo
     */
    public $customer;
    /**
     * The hotel
     * @var Hotel
     */
    public $hotel;

    /**
     * Constructor method for reserve_info_request
     * @param string $_status
     * @param string $_reserve_status
     * @param string $_insert_date
     * @param string $_in_date
     * @param int $_days_count
     * @param int $_final_price
     * @param string $_city
     * @param CustomerInfo $_customer
     * @param Hotel $_hotel
     * @return ReserveInfoResponse
     */
    public function __construct($_status = NULL,$_reserve_status = NULL,$_insert_date = NULL,$_in_date = NULL,$_days_count = NULL,$_final_price = NULL,$_city = NULL,$_customer = NULL,$_hotel = NULL)
    {
        $this->status=$_status;
        $this->reserve_status=$_reserve_status;
        $this->insert_date=$_insert_date;
        $this->in_date=$_in_date;
        $this->days_count=$_days_count;
        $this->final_price=$_final_price;
        $this->city=$_city;
        $this->customer=$_customer;
        $this->hotel=$_hotel;
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