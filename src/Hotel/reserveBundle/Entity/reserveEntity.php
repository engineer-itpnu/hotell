<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class reserveEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $startdate;

    /** 
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $status;

    /** 
     * @ORM\OneToOne(targetEntity="blankEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="bid", referencedColumnName="id", nullable=false, unique=true)
     */
    private $blankEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="customerEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="cid", referencedColumnName="id", nullable=false)
     */
    private $customerEntity;

    /** 
     * @ORM\ManyToOne(targetEntity="agencyEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="aid", referencedColumnName="id", nullable=false)
     */
    private $agencyEntity;

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return reserveEntity
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    
        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return reserveEntity
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set blankEntity
     *
     * @param \Hotel\reserveBundle\Entity\blankEntity $blankEntity
     * @return reserveEntity
     */
    public function setBlankEntity(\Hotel\reserveBundle\Entity\blankEntity $blankEntity)
    {
        $this->blankEntity = $blankEntity;
    
        return $this;
    }

    /**
     * Get blankEntity
     *
     * @return \Hotel\reserveBundle\Entity\blankEntity 
     */
    public function getBlankEntity()
    {
        return $this->blankEntity;
    }

    /**
     * Set customerEntity
     *
     * @param \Hotel\reserveBundle\Entity\customerEntity $customerEntity
     * @return reserveEntity
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
     * Set agencyEntity
     *
     * @param \Hotel\reserveBundle\Entity\agencyEntity $agencyEntity
     * @return reserveEntity
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
    public function __tostring()
    {
        return $this->status . ' ';
    }
}