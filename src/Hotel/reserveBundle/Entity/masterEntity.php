<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class masterEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=300, nullable=false)
     */
    private $accountStock;

    /** 
     * @ORM\Column(type="integer", length=300, nullable=false)
     */
    private $accountChangeValue;

    /** 
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $accountStatus;

    /** 
     * @ORM\Column(nullable=false)
     */
    private $accountReqestData;

    /** 
     * @ORM\OneToOne(targetEntity="userEntity", inversedBy="masterEntities")
     * @ORM\JoinColumn(name="umid", referencedColumnName="id", nullable=false, unique=true)
     */
    private $userEntity;

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
     * Set accountStock
     *
     * @param integer $accountStock
     * @return masterEntity
     */
    public function setAccountStock($accountStock)
    {
        $this->accountStock = $accountStock;
    
        return $this;
    }

    /**
     * Get accountStock
     *
     * @return integer 
     */
    public function getAccountStock()
    {
        return $this->accountStock;
    }

    /**
     * Set accountChangeValue
     *
     * @param integer $accountChangeValue
     * @return masterEntity
     */
    public function setAccountChangeValue($accountChangeValue)
    {
        $this->accountChangeValue = $accountChangeValue;
    
        return $this;
    }

    /**
     * Get accountChangeValue
     *
     * @return integer 
     */
    public function getAccountChangeValue()
    {
        return $this->accountChangeValue;
    }

    /**
     * Set accountStatus
     *
     * @param boolean $accountStatus
     * @return masterEntity
     */
    public function setAccountStatus($accountStatus)
    {
        $this->accountStatus = $accountStatus;
    
        return $this;
    }

    /**
     * Get accountStatus
     *
     * @return boolean 
     */
    public function getAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * Set accountReqestData
     *
     * @param string $accountReqestData
     * @return masterEntity
     */
    public function setAccountReqestData($accountReqestData)
    {
        $this->accountReqestData = $accountReqestData;
    
        return $this;
    }

    /**
     * Get accountReqestData
     *
     * @return string 
     */
    public function getAccountReqestData()
    {
        return $this->accountReqestData;
    }

    /**
     * Set userEntity
     *
     * @param \Hotel\reserveBundle\Entity\userEntity $userEntity
     * @return masterEntity
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
}