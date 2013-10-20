<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class hotelEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $hotel_name;

    /** 
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $hotel_manageName;

    /** 
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    private $hotel_grade;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $hotel_city;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $hotel_zipcode;

    /** 
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $hotel_email;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=true)
     */
    private $hotel_phone;

    /** 
     * @ORM\Column(type="integer", length=100, nullable=false)
     */
    private $hotel_mobile;

    /** 
     * @ORM\Column(type="integer", length=200, nullable=false)
     */
    private $hotel_addRoomTtariff;

    /** 
     * @ORM\OneToMany(targetEntity="roomEntity", mappedBy="hotelEntity")
     */
    private $roomEntities;

    /** 
     * @ORM\ManyToOne(targetEntity="userEntity", inversedBy="hotelEntities")
     * @ORM\JoinColumn(name="uid", referencedColumnName="id", nullable=false)
     */
    private $userEntity;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roomEntities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set hotel_name
     *
     * @param string $hotelName
     * @return hotelEntity
     */
    public function setHotelName($hotelName)
    {
        $this->hotel_name = $hotelName;
    
        return $this;
    }

    /**
     * Get hotel_name
     *
     * @return string 
     */
    public function getHotelName()
    {
        return $this->hotel_name;
    }

    /**
     * Set hotel_manageName
     *
     * @param string $hotelManageName
     * @return hotelEntity
     */
    public function setHotelManageName($hotelManageName)
    {
        $this->hotel_manageName = $hotelManageName;
    
        return $this;
    }

    /**
     * Get hotel_manageName
     *
     * @return string 
     */
    public function getHotelManageName()
    {
        return $this->hotel_manageName;
    }

    /**
     * Set hotel_grade
     *
     * @param string $hotelGrade
     * @return hotelEntity
     */
    public function setHotelGrade($hotelGrade)
    {
        $this->hotel_grade = $hotelGrade;
    
        return $this;
    }

    /**
     * Get hotel_grade
     *
     * @return string 
     */
    public function getHotelGrade()
    {
        return $this->hotel_grade;
    }

    /**
     * Set hotel_city
     *
     * @param string $hotelCity
     * @return hotelEntity
     */
    public function setHotelCity($hotelCity)
    {
        $this->hotel_city = $hotelCity;
    
        return $this;
    }

    /**
     * Get hotel_city
     *
     * @return string 
     */
    public function getHotelCity()
    {
        return $this->hotel_city;
    }

    /**
     * Set hotel_zipcode
     *
     * @param integer $hotelZipcode
     * @return hotelEntity
     */
    public function setHotelZipcode($hotelZipcode)
    {
        $this->hotel_zipcode = $hotelZipcode;
    
        return $this;
    }

    /**
     * Get hotel_zipcode
     *
     * @return integer 
     */
    public function getHotelZipcode()
    {
        return $this->hotel_zipcode;
    }

    /**
     * Set hotel_email
     *
     * @param string $hotelEmail
     * @return hotelEntity
     */
    public function setHotelEmail($hotelEmail)
    {
        $this->hotel_email = $hotelEmail;
    
        return $this;
    }

    /**
     * Get hotel_email
     *
     * @return string 
     */
    public function getHotelEmail()
    {
        return $this->hotel_email;
    }

    /**
     * Set hotel_phone
     *
     * @param integer $hotelPhone
     * @return hotelEntity
     */
    public function setHotelPhone($hotelPhone)
    {
        $this->hotel_phone = $hotelPhone;
    
        return $this;
    }

    /**
     * Get hotel_phone
     *
     * @return integer 
     */
    public function getHotelPhone()
    {
        return $this->hotel_phone;
    }

    /**
     * Set hotel_mobile
     *
     * @param integer $hotelMobile
     * @return hotelEntity
     */
    public function setHotelMobile($hotelMobile)
    {
        $this->hotel_mobile = $hotelMobile;
    
        return $this;
    }

    /**
     * Get hotel_mobile
     *
     * @return integer 
     */
    public function getHotelMobile()
    {
        return $this->hotel_mobile;
    }

    /**
     * Set hotel_addRoomTtariff
     *
     * @param integer $hotelAddRoomTtariff
     * @return hotelEntity
     */
    public function setHotelAddRoomTtariff($hotelAddRoomTtariff)
    {
        $this->hotel_addRoomTtariff = $hotelAddRoomTtariff;
    
        return $this;
    }

    /**
     * Get hotel_addRoomTtariff
     *
     * @return integer 
     */
    public function getHotelAddRoomTtariff()
    {
        return $this->hotel_addRoomTtariff;
    }

    /**
     * Add roomEntities
     *
     * @param \Hotel\reserveBundle\Entity\roomEntity $roomEntities
     * @return hotelEntity
     */
    public function addRoomEntitie(\Hotel\reserveBundle\Entity\roomEntity $roomEntities)
    {
        $this->roomEntities[] = $roomEntities;
    
        return $this;
    }

    /**
     * Remove roomEntities
     *
     * @param \Hotel\reserveBundle\Entity\roomEntity $roomEntities
     */
    public function removeRoomEntitie(\Hotel\reserveBundle\Entity\roomEntity $roomEntities)
    {
        $this->roomEntities->removeElement($roomEntities);
    }

    /**
     * Get roomEntities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoomEntities()
    {
        return $this->roomEntities;
    }

    /**
     * Set userEntity
     *
     * @param \Hotel\reserveBundle\Entity\userEntity $userEntity
     * @return hotelEntity
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
    public function __tostring()
    {
        return $this->hotel_name . ' ';
    }
}