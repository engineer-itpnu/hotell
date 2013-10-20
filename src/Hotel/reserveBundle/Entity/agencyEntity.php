<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class agencyEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=200, nullable=false)
     */
    private $account_stock;

    /** 
     * @ORM\Column(type="integer", length=200, nullable=false)
     */
    private $account_changeValue;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $account_status;

    /** 
     * @ORM\Column(type="date", nullable=false)
     */
    private $account_requestDate;

    /** 
     * @ORM\OneToOne(targetEntity="userEntity", inversedBy="accountEntities")
     * @ORM\JoinColumn(name="uaid", referencedColumnName="id", nullable=false, unique=true)
     */
    private $userEntity;

    /** 
     * @ORM\OneToMany(targetEntity="reserveEntity", mappedBy="agencyEntity")
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
     * Set account_stock
     *
     * @param integer $accountStock
     * @return agencyEntity
     */
    public function setAccountStock($accountStock)
    {
        $this->account_stock = $accountStock;
    
        return $this;
    }

    /**
     * Get account_stock
     *
     * @return integer 
     */
    public function getAccountStock()
    {
        return $this->account_stock;
    }

    /**
     * Set account_changeValue
     *
     * @param integer $accountChangeValue
     * @return agencyEntity
     */
    public function setAccountChangeValue($accountChangeValue)
    {
        $this->account_changeValue = $accountChangeValue;
    
        return $this;
    }

    /**
     * Get account_changeValue
     *
     * @return integer 
     */
    public function getAccountChangeValue()
    {
        return $this->account_changeValue;
    }

    /**
     * Set account_status
     *
     * @param string $accountStatus
     * @return agencyEntity
     */
    public function setAccountStatus($accountStatus)
    {
        $this->account_status = $accountStatus;
    
        return $this;
    }

    /**
     * Get account_status
     *
     * @return string 
     */
    public function getAccountStatus()
    {
        return $this->account_status;
    }

    /**
     * Set account_requestDate
     *
     * @param \DateTime $accountRequestDate
     * @return agencyEntity
     */
    public function setAccountRequestDate($accountRequestDate)
    {
        $this->account_requestDate = $accountRequestDate;
    
        return $this;
    }

    /**
     * Get account_requestDate
     *
     * @return \DateTime 
     */
    public function getAccountRequestDate()
    {
        return $this->account_requestDate;
    }

    /**
     * Set userEntity
     *
     * @param \Hotel\reserveBundle\Entity\userEntity $userEntity
     * @return agencyEntity
     */
    public function setUserEntity(\Hotel\reserveBundle\Entity\userEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    
        return $this;
    }

    /**
     * Get userEntity
     *
     * @return \Hotel\reserveBundle\Entity\userEntity 
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * Add reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     * @return agencyEntity
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