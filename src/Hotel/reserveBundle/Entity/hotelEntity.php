<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hotelentity", indexes={
 *  @ORM\Index(name="hotel_city_idx", columns={"hotel_city"}),
 *  @ORM\Index(name="hotel_active_idx", columns={"hotel_active"})
 * })
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
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    private $hotel_name;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    private $hotel_manageName;

    /**
     * @ORM\Column(type="string", length=7, nullable=false)
     */
    private $hotel_grade;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $hotel_city;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $hotel_zipcode;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    private $hotel_email;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $hotel_phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $hotel_mobile;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $hotel_addRoomTtariff;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $hotel_active;

    /**
     * @ORM\OneToMany(targetEntity="accountEntity", mappedBy="hotelEntity")
     */
    private $accountEntities;

    /**
     * @ORM\OneToMany(targetEntity="moneyEntity", mappedBy="hotelEntity")
     */
    private $moneyEntities;

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
        $this->accountEntities = new ArrayCollection();
        $this->moneyEntities = new ArrayCollection();
        $this->roomEntities = new ArrayCollection();
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
     * Set hotel_active
     *
     * @param boolean $hotelActive
     * @return hotelEntity
     */
    public function setHotelActive($hotelActive)
    {
        $this->hotel_active = $hotelActive;

        return $this;
    }

    /**
     * Get hotel_active
     *
     * @return boolean
     */
    public function getHotelActive()
    {
        return $this->hotel_active;
    }

    /**
     * Add accountEntities
     *
     * @param accountEntity $accountEntities
     * @return hotelEntity
     */
    public function addAccountEntitie(accountEntity $accountEntities)
    {
        $this->accountEntities[] = $accountEntities;

        return $this;
    }

    /**
     * Remove accountEntities
     *
     * @param accountEntity $accountEntities
     */
    public function removeAccountEntitie(accountEntity $accountEntities)
    {
        $this->accountEntities->removeElement($accountEntities);
    }

    /**
     * Get accountEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccountEntities()
    {
        return $this->accountEntities;
    }

    /**
     * Add moneyEntities
     *
     * @param moneyEntity $moneyEntities
     * @return hotelEntity
     */
    public function addMoneyEntitie(moneyEntity $moneyEntities)
    {
        $this->moneyEntities[] = $moneyEntities;

        return $this;
    }

    /**
     * Remove moneyEntities
     *
     * @param moneyEntity $moneyEntities
     */
    public function removeMoneyEntitie(moneyEntity $moneyEntities)
    {
        $this->moneyEntities->removeElement($moneyEntities);
    }

    /**
     * Get moneyEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMoneyEntities()
    {
        return $this->moneyEntities;
    }

    /**
     * Add roomEntities
     *
     * @param roomEntity $roomEntities
     * @return hotelEntity
     */
    public function addRoomEntitie(roomEntity $roomEntities)
    {
        $this->roomEntities[] = $roomEntities;

        return $this;
    }

    /**
     * Remove roomEntities
     *
     * @param roomEntity $roomEntities
     */
    public function removeRoomEntitie(roomEntity $roomEntities)
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
     * @param userEntity $userEntity
     * @return hotelEntity
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
    public function __toString()
    {
        return $this->hotel_name;
    }
}