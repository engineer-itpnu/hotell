<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class customerEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $cust_name;

    /** 
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $cust_family;

    /** 
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $cust_email;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $cust_phone;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $cust_mobile;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $cust_roomCode;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $cust_hotelCode;

    /** 
     * @ORM\Column(type="integer", length=250, nullable=false)
     */
    private $cust_voucher;

    /** 
     * @ORM\OneToMany(targetEntity="reserveEntity", mappedBy="customerEntity")
     */
    private $reserveEntities;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reserveEntities = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cust_name
     *
     * @param string $custName
     * @return customerEntity
     */
    public function setCustName($custName)
    {
        $this->cust_name = $custName;
    
        return $this;
    }

    /**
     * Get cust_name
     *
     * @return string 
     */
    public function getCustName()
    {
        return $this->cust_name;
    }

    /**
     * Set cust_family
     *
     * @param string $custFamily
     * @return customerEntity
     */
    public function setCustFamily($custFamily)
    {
        $this->cust_family = $custFamily;
    
        return $this;
    }

    /**
     * Get cust_family
     *
     * @return string 
     */
    public function getCustFamily()
    {
        return $this->cust_family;
    }

    /**
     * Set cust_email
     *
     * @param string $custEmail
     * @return customerEntity
     */
    public function setCustEmail($custEmail)
    {
        $this->cust_email = $custEmail;
    
        return $this;
    }

    /**
     * Get cust_email
     *
     * @return string 
     */
    public function getCustEmail()
    {
        return $this->cust_email;
    }

    /**
     * Set cust_phone
     *
     * @param string $custPhone
     * @return customerEntity
     */
    public function setCustPhone($custPhone)
    {
        $this->cust_phone = $custPhone;
    
        return $this;
    }

    /**
     * Get cust_phone
     *
     * @return string 
     */
    public function getCustPhone()
    {
        return $this->cust_phone;
    }

    /**
     * Set cust_mobile
     *
     * @param string $custMobile
     * @return customerEntity
     */
    public function setCustMobile($custMobile)
    {
        $this->cust_mobile = $custMobile;
    
        return $this;
    }

    /**
     * Get cust_mobile
     *
     * @return string 
     */
    public function getCustMobile()
    {
        return $this->cust_mobile;
    }

    /**
     * Set cust_roomCode
     *
     * @param integer $custRoomCode
     * @return customerEntity
     */
    public function setCustRoomCode($custRoomCode)
    {
        $this->cust_roomCode = $custRoomCode;
    
        return $this;
    }

    /**
     * Get cust_roomCode
     *
     * @return integer 
     */
    public function getCustRoomCode()
    {
        return $this->cust_roomCode;
    }

    /**
     * Set cust_hotelCode
     *
     * @param integer $custHotelCode
     * @return customerEntity
     */
    public function setCustHotelCode($custHotelCode)
    {
        $this->cust_hotelCode = $custHotelCode;
    
        return $this;
    }

    /**
     * Get cust_hotelCode
     *
     * @return integer 
     */
    public function getCustHotelCode()
    {
        return $this->cust_hotelCode;
    }

    /**
     * Set cust_voucher
     *
     * @param integer $custVoucher
     * @return customerEntity
     */
    public function setCustVoucher($custVoucher)
    {
        $this->cust_voucher = $custVoucher;
    
        return $this;
    }

    /**
     * Get cust_voucher
     *
     * @return integer 
     */
    public function getCustVoucher()
    {
        return $this->cust_voucher;
    }

    /**
     * Add reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     * @return customerEntity
     */
    public function addReserveEntitie(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntities)
    {
        $this->reserveEntities[] = $reserveEntities;
    
        return $this;
    }

    /**
     * Remove reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     */
    public function removeReserveEntitie(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntities)
    {
        $this->reserveEntities->removeElement($reserveEntities);
    }

    /**
     * Get reserveEntities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReserveEntities()
    {
        return $this->reserveEntities;
    }
}