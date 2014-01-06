<?php
namespace Hotel\reserveBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roomentity", indexes={
 *  @ORM\Index(name="room_type_idx", columns={"room_type"})
 * })
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
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $room_type;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    private $room_name;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $room_capacity;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $room_addCapacity;

    /**
     * @ORM\OneToMany(targetEntity="blankEntity", mappedBy="roomEntity")
     */
    private $blankEntities;

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
        $this->blankEntities = new ArrayCollection();
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
     * Add blankEntities
     *
     * @param blankEntity $blankEntities
     * @return roomEntity
     */
    public function addBlankEntitie(blankEntity $blankEntities)
    {
        $this->blankEntities[] = $blankEntities;

        return $this;
    }

    /**
     * Remove blankEntities
     *
     * @param blankEntity $blankEntities
     */
    public function removeBlankEntitie(blankEntity $blankEntities)
    {
        $this->blankEntities->removeElement($blankEntities);
    }

    /**
     * Get blankEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlankEntities()
    {
        return $this->blankEntities;
    }

    /**
     * Set hotelEntity
     *
     * @param hotelEntity $hotelEntity
     * @return roomEntity
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
    public function __toString()
    {
        return $this->room_name;
    }
}