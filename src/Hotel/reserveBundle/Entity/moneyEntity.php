<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="moneyentity")
 */
class moneyEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $money_type;

    /** 
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $money_price;

    /** 
     * @ORM\Column(type="date", nullable=false)
     */
    private $money_DateReq;

    /** 
     * @ORM\Column(type="date", nullable=true)
     */
    private $money_DateReply;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $money_status;

    /** 
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $money_NumBill;

    /** 
     * @ORM\Column(type="date", nullable=true)
     */
    private $money_DateBill;

    /** 
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $money_BankName;

    /** 
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $money_branch;

    /** 
     * @ORM\ManyToOne(targetEntity="userEntity", inversedBy="moneyEntities")
     * @ORM\JoinColumn(name="umid", referencedColumnName="id", nullable=false)
     */
    private $userEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="hotelEntity", inversedBy="moneyEntities")
     * @ORM\JoinColumn(name="hmid", referencedColumnName="id", nullable=true)
     */
    private $hotelEntity;

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
     * Set money_type
     *
     * @param boolean $moneyType
     * @return moneyEntity
     */
    public function setMoneyType($moneyType)
    {
        $this->money_type = $moneyType;
    
        return $this;
    }

    /**
     * Get money_type
     *
     * @return boolean 
     */
    public function getMoneyType()
    {
        return $this->money_type;
    }

    /**
     * Set money_price
     *
     * @param string $moneyPrice
     * @return moneyEntity
     */
    public function setMoneyPrice($moneyPrice)
    {
        $this->money_price = $moneyPrice;
    
        return $this;
    }

    /**
     * Get money_price
     *
     * @return string 
     */
    public function getMoneyPrice()
    {
        return $this->money_price;
    }

    /**
     * Set money_DateReq
     *
     * @param \DateTime $moneyDateReq
     * @return moneyEntity
     */
    public function setMoneyDateReq($moneyDateReq)
    {
        $this->money_DateReq = $moneyDateReq;
    
        return $this;
    }

    /**
     * Get money_DateReq
     *
     * @return \DateTime 
     */
    public function getMoneyDateReq()
    {
        return $this->money_DateReq;
    }

    /**
     * Set money_DateReply
     *
     * @param \DateTime $moneyDateReply
     * @return moneyEntity
     */
    public function setMoneyDateReply($moneyDateReply)
    {
        $this->money_DateReply = $moneyDateReply;
    
        return $this;
    }

    /**
     * Get money_DateReply
     *
     * @return \DateTime 
     */
    public function getMoneyDateReply()
    {
        return $this->money_DateReply;
    }

    /**
     * Set money_status
     *
     * @param smallint $moneyStatus
     * @return moneyEntity
     */
    public function setMoneyStatus($moneyStatus)
    {
        $this->money_status = $moneyStatus;

        return $this;
    }

    /**
     * Get money_status
     *
     * @return smallint
     */
    public function getMoneyStatus()
    {
        return $this->money_status;
    }

    /**
     * Set money_NumBill
     *
     * @param string $moneyNumBill
     * @return moneyEntity
     */
    public function setMoneyNumBill($moneyNumBill)
    {
        $this->money_NumBill = $moneyNumBill;
    
        return $this;
    }

    /**
     * Get money_NumBill
     *
     * @return string 
     */
    public function getMoneyNumBill()
    {
        return $this->money_NumBill;
    }

    /**
     * Set money_DateBill
     *
     * @param \DateTime $moneyDateBill
     * @return moneyEntity
     */
    public function setMoneyDateBill($moneyDateBill)
    {
        $this->money_DateBill = $moneyDateBill;
    
        return $this;
    }

    /**
     * Get money_DateBill
     *
     * @return \DateTime 
     */
    public function getMoneyDateBill()
    {
        return $this->money_DateBill;
    }

    /**
     * Set money_BankName
     *
     * @param string $moneyBankName
     * @return moneyEntity
     */
    public function setMoneyBankName($moneyBankName)
    {
        $this->money_BankName = $moneyBankName;
    
        return $this;
    }

    /**
     * Get money_BankName
     *
     * @return string 
     */
    public function getMoneyBankName()
    {
        return $this->money_BankName;
    }

    /**
     * Set money_branch
     *
     * @param string $moneyBranch
     * @return moneyEntity
     */
    public function setMoneyBranch($moneyBranch)
    {
        $this->money_branch = $moneyBranch;
    
        return $this;
    }

    /**
     * Get money_branch
     *
     * @return string 
     */
    public function getMoneyBranch()
    {
        return $this->money_branch;
    }

    /**
     * Set userEntity
     *
     * @param userEntity $userEntity
     * @return moneyEntity
     */
    public function setUserEntity(userEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    
        return $this;
    }

    /**
     * Get userEntity
     *
     * @return userEntity
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * Set hotelEntity
     *
     * @param hotelEntity $hotelEntity
     * @return moneyEntity
     */
    public function setHotelEntity(hotelEntity $hotelEntity)
    {
        $this->hotelEntity = $hotelEntity;
    
        return $this;
    }

    /**
     * Get hotelEntity
     *
     * @return hotelEntity
     */
    public function getHotelEntity()
    {
        return $this->hotelEntity;
    }
}