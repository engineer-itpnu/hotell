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
     * @param string $_first_name
     * @param string $_last_name
     * @param string $_email
     * @param string $_phone
     * @param string $_mobile
     * @return CustomerInfo
     */
    public function __construct($_first_name = null,$_last_name = null,$_email = null,$_phone = null,$_mobile = null
    ) {
        $this->first_name = $_first_name;
        $this->last_name = $_last_name;
        $this->email = $_email;
        $this->phone = $_phone;
        $this->mobile = $_mobile;
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