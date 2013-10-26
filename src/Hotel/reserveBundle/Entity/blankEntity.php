<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class blankEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateIN;

    /** 
     * @ORM\Column(type="integer", length=255, nullable=false)
     */
    private $countNight;

    /** 
     * @ORM\Column(type="integer", length=255, nullable=false)
     */
    private $Tariff;

    /** 
     * @ORM\OneToOne(targetEntity="reserveEntity", mappedBy="blankEntity")
     */
    private $reserveEntities;

    /** 
     * @ORM\ManyToOne(targetEntity="roomEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="rid", referencedColumnName="id", nullable=false)
     */
    private $roomEntity;
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
     * Set dateIN
     *
     * @param \DateTime $dateIN
     * @return blankEntity
     */
    public function setDateIN($dateIN)
    {
        $this->dateIN = $dateIN;
    
        return $this;
    }

    /**
     * Get dateIN
     *
     * @return \DateTime 
     */
    public function getDateIN()
    {
        return $this->dateIN;
    }

    /**
     * Set countNight
     *
     * @param integer $countNight
     * @return blankEntity
     */
    public function setCountNight($countNight)
    {
        $this->countNight = $countNight;
    
        return $this;
    }

    /**
     * Get countNight
     *
     * @return integer 
     */
    public function getCountNight()
    {
        return $this->countNight;
    }

    /**
     * Set Tariff
     *
     * @param integer $tariff
     * @return blankEntity
     */
    public function setTariff($tariff)
    {
        $this->Tariff = $tariff;
    
        return $this;
    }

    /**
     * Get Tariff
     *
     * @return integer 
     */
    public function getTariff()
    {
        return $this->Tariff;
    }

    /**
     * Set reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     * @return blankEntity
     */
    public function setReserveEntities(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntities = null)
    {
        $this->reserveEntities = $reserveEntities;
    
        return $this;
    }

    /**
     * Get reserveEntities
     *
     * @return \Hotel\reserveBundle\Entity\reserveEntity 
     */
    public function getReserveEntities()
    {
        return $this->reserveEntities;
    }

    /**
     * Set roomEntity
     *
     * @param \Hotel\reserveBundle\Entity\roomEntity $roomEntity
     * @return blankEntity
     */
    public function setRoomEntity(\Hotel\reserveBundle\Entity\roomEntity $roomEntity)
    {
        $this->roomEntity = $roomEntity;
    
        return $this;
    }

    /**
     * Get roomEntity
     *
     * @return \Hotel\reserveBundle\Entity\roomEntity 
     */
    public function getRoomEntity()
    {
        return $this->roomEntity;
    }
    public function __tostring()
    {
        return $this->roomEntity . ' ';
    }
}