<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class roomEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $room_type;

    /** 
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $room_name;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $room_capacity;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=true)
     */
    private $room_addCapacity;

    /** 
     * @ORM\OneToMany(targetEntity="blankEntity", mappedBy="roomEntity")
     */
    private $reserveEntities;

    /** 
     * @ORM\ManyToOne(targetEntity="hotelEntity", inversedBy="roomEntities")
     * @ORM\JoinColumn(name="hid", referencedColumnName="id", nullable=false)
     */
    private $hotelEntity;
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
     * Set room_type
     *
     * @param integer $roomType
     * @return roomEntity
     */
    public function setRoomType($roomType)
    {
        $this->room_type = $roomType;
    
        return $this;
    }

    /**
     * Get room_type
     *
     * @return integer 
     */
    public function getRoomType()
    {
        return $this->room_type;
    }

    /**
     * Set room_name
     *
     * @param string $roomName
     * @return roomEntity
     */
    public function setRoomName($roomName)
    {
        $this->room_name = $roomName;
    
        return $this;
    }

    /**
     * Get room_name
     *
     * @return string 
     */
    public function getRoomName()
    {
        return $this->room_name;
    }

    /**
     * Set room_capacity
     *
     * @param integer $roomCapacity
     * @return roomEntity
     */
    public function setRoomCapacity($roomCapacity)
    {
        $this->room_capacity = $roomCapacity;
    
        return $this;
    }

    /**
     * Get room_capacity
     *
     * @return integer 
     */
    public function getRoomCapacity()
    {
        return $this->room_capacity;
    }

    /**
     * Set room_addCapacity
     *
     * @param integer $roomAddCapacity
     * @return roomEntity
     */
    public function setRoomAddCapacity($roomAddCapacity)
    {
        $this->room_addCapacity = $roomAddCapacity;
    
        return $this;
    }

    /**
     * Get room_addCapacity
     *
     * @return integer 
     */
    public function getRoomAddCapacity()
    {
        return $this->room_addCapacity;
    }

    /**
     * Add reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\blankEntity $reserveEntities
     * @return roomEntity
     */
    public function addReserveEntitie(\Hotel\reserveBundle\Entity\blankEntity $reserveEntities)
    {
        $this->reserveEntities[] = $reserveEntities;
    
        return $this;
    }

    /**
     * Remove reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\blankEntity $reserveEntities
     */
    public function removeReserveEntitie(\Hotel\reserveBundle\Entity\blankEntity $reserveEntities)
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

    /**
     * Set hotelEntity
     *
     * @param \Hotel\reserveBundle\Entity\hotelEntity $hotelEntity
     * @return roomEntity
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

}