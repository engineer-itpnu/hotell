<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class bankEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $bank_au;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $bank_rand;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $bank_TimeStamp;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $bank_status;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $bank_price;

    /** 
     * @ORM\ManyToOne(targetEntity="userEntity", inversedBy="bankEntities")
     * @ORM\JoinColumn(name="ubid", referencedColumnName="id", nullable=false)
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
     * Set bank_au
     *
     * @param string $bankAu
     * @return bankEntity
     */
    public function setBankAu($bankAu)
    {
        $this->bank_au = $bankAu;
    
        return $this;
    }

    /**
     * Get bank_au
     *
     * @return string 
     */
    public function getBankAu()
    {
        return $this->bank_au;
    }

    /**
     * Set bank_rand
     *
     * @param string $bankRand
     * @return bankEntity
     */
    public function setBankRand($bankRand)
    {
        $this->bank_rand = $bankRand;
    
        return $this;
    }

    /**
     * Get bank_rand
     *
     * @return string 
     */
    public function getBankRand()
    {
        return $this->bank_rand;
    }

    /**
     * Set bank_TimeStamp
     *
     * @param string $bankTimeStamp
     * @return bankEntity
     */
    public function setBankTimeStamp($bankTimeStamp)
    {
        $this->bank_TimeStamp = $bankTimeStamp;
    
        return $this;
    }

    /**
     * Get bank_TimeStamp
     *
     * @return string 
     */
    public function getBankTimeStamp()
    {
        return $this->bank_TimeStamp;
    }

    /**
     * Set bank_status
     *
     * @param string $bankStatus
     * @return bankEntity
     */
    public function setBankStatus($bankStatus)
    {
        $this->bank_status = $bankStatus;
    
        return $this;
    }

    /**
     * Get bank_status
     *
     * @return string 
     */
    public function getBankStatus()
    {
        return $this->bank_status;
    }

    /**
     * Set bank_price
     *
     * @param string $bankPrice
     * @return bankEntity
     */
    public function setBankPrice($bankPrice)
    {
        $this->bank_price = $bankPrice;
    
        return $this;
    }

    /**
     * Get bank_price
     *
     * @return string 
     */
    public function getBankPrice()
    {
        return $this->bank_price;
    }

    /**
     * Set userEntity
     *
     * @param \Hotel\reserveBundle\Entity\userEntity $userEntity
     * @return bankEntity
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