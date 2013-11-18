<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="accountentity")
 */
class accountEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $price;

    /** 
     * @ORM\Column(type="integer", nullable=false)
     */
    private $type;

    /** 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StockHotel;

    /** 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StockAgency;

    /** 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumberPey;

    /** 
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateTime;

    /** 
     * @ORM\ManyToOne(targetEntity="hotelEntity", inversedBy="accountEntities")
     * @ORM\JoinColumn(name="hotelid", referencedColumnName="id", nullable=true)
     */
    private $hotelEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="agencyEntity", inversedBy="accountEntities")
     * @ORM\JoinColumn(name="agencyid", referencedColumnName="id", nullable=true)
     */
    private $agencyEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="customerEntity", inversedBy="accountEntities")
     * @ORM\JoinColumn(name="customid", referencedColumnName="id", nullable=true)
     */
    private $customerEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="reserveEntity", inversedBy="accountEntities")
     * @ORM\JoinColumn(name="reserveid", referencedColumnName="id", nullable=true)
     */
    private $reserveEntity;

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
     * Set price
     *
     * @param integer $price
     * @return accountEntity
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return accountEntity
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set StockHotel
     *
     * @param integer $stockHotel
     * @return accountEntity
     */
    public function setStockHotel($stockHotel)
    {
        $this->StockHotel = $stockHotel;
    
        return $this;
    }

    /**
     * Get StockHotel
     *
     * @return integer 
     */
    public function getStockHotel()
    {
        return $this->StockHotel;
    }

    /**
     * Set StockAgency
     *
     * @param integer $stockAgency
     * @return accountEntity
     */
    public function setStockAgency($stockAgency)
    {
        $this->StockAgency = $stockAgency;
    
        return $this;
    }

    /**
     * Get StockAgency
     *
     * @return integer 
     */
    public function getStockAgency()
    {
        return $this->StockAgency;
    }

    /**
     * Set NumberPey
     *
     * @param integer $numberPey
     * @return accountEntity
     */
    public function setNumberPey($numberPey)
    {
        $this->NumberPey = $numberPey;
    
        return $this;
    }

    /**
     * Get NumberPey
     *
     * @return integer 
     */
    public function getNumberPey()
    {
        return $this->NumberPey;
    }

    /**
     * Set DateTime
     *
     * @param \DateTime $dateTime
     * @return accountEntity
     */
    public function setDateTime($dateTime)
    {
        $this->DateTime = $dateTime;
    
        return $this;
    }

    /**
     * Get DateTime
     *
     * @return \DateTime 
     */
    public function getDateTime()
    {
        return $this->DateTime;
    }

    /**
     * Set hotelEntity
     *
     * @param \Hotel\reserveBundle\Entity\hotelEntity $hotelEntity
     * @return accountEntity
     */
    public function setHotelEntity(\Hotel\reserveBundle\Entity\hotelEntity $hotelEntity)
    {
        $this->hotelEntity = $hotelEntity;
    
        return $this;
    }

    /**
     * Get hotelEntity
     *
     * @return \Hotel\reserveBundle\Entity\hotelEntity
     */
    public function getHotelEntity()
    {
        return $this->hotelEntity;
    }

    /**
     * Set agencyEntity
     *
     * @param \Hotel\reserveBundle\Entity\agencyEntity $agencyEntity
     * @return accountEntity
     */
    public function setAgencyEntity(\Hotel\reserveBundle\Entity\agencyEntity $agencyEntity)
    {
        $this->agencyEntity = $agencyEntity;
    
        return $this;
    }

    /**
     * Get agencyEntity
     *
     * @return \Hotel\reserveBundle\Entity\agencyEntity 
     */
    public function getAgencyEntity()
    {
        return $this->agencyEntity;
    }

    /**
     * Set customerEntity
     *
     * @param \Hotel\reserveBundle\Entity\customerEntity $customerEntity
     * @return accountEntity
     */
    public function setCustomerEntity(\Hotel\reserveBundle\Entity\customerEntity $customerEntity)
    {
        $this->customerEntity = $customerEntity;
    
        return $this;
    }

    /**
     * Get customerEntity
     *
     * @return \Hotel\reserveBundle\Entity\customerEntity 
     */
    public function getCustomerEntity()
    {
        return $this->customerEntity;
    }

    /**
     * Set reserveEntity
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntity
     * @return accountEntity
     */
    public function setReserveEntity(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntity)
    {
        $this->reserveEntity = $reserveEntity;
    
        return $this;
    }

    /**
     * Get reserveEntity
     *
     * @return \Hotel\reserveBundle\Entity\reserveEntity 
     */
    public function getReserveEntity()
    {
        return $this->reserveEntity;
    }

}