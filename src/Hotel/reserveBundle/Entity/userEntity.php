<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class userEntity extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $user_firstname;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $user_family;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $user_phone;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $user_mobile;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $user_city;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $user_accountNumber;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $user_cardNumber;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $user_nameBank;

    /**
     * @ORM\OneToOne(targetEntity="agencyEntity", mappedBy="userEntity")
     */
    private $agencyEntity;

    /**
     * @ORM\OneToMany(targetEntity="bankEntity", mappedBy="userEntity")
     */
    private $bankEntities;

    /**
     * @ORM\OneToMany(targetEntity="moneyEntity", mappedBy="userEntity")
     */
    private $moneyEntities;

    /**
     * @ORM\OneToMany(targetEntity="hotelEntity", mappedBy="userEntity")
     */
    private $hotelEntities;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bankEntities = new ArrayCollection();
        $this->moneyEntities = new ArrayCollection();
        $this->hotelEntities = new ArrayCollection();
        parent::__construct();
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
     * Set user_firstname
     *
     * @param string $userFirstname
     * @return userEntity
     */
    public function setUserFirstname($userFirstname)
    {
        $this->user_firstname = $userFirstname;

        return $this;
    }

    /**
     * Get user_firstname
     *
     * @return string
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * Set user_family
     *
     * @param string $userFamily
     * @return userEntity
     */
    public function setUserFamily($userFamily)
    {
        $this->user_family = $userFamily;

        return $this;
    }

    /**
     * Get user_family
     *
     * @return string
     */
    public function getUserFamily()
    {
        return $this->user_family;
    }

    /**
     * Set user_phone
     *
     * @param integer $userPhone
     * @return userEntity
     */
    public function setUserPhone($userPhone)
    {
        $this->user_phone = $userPhone;

        return $this;
    }

    /**
     * Get user_phone
     *
     * @return integer
     */
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    /**
     * Set user_mobile
     *
     * @param integer $userMobile
     * @return userEntity
     */
    public function setUserMobile($userMobile)
    {
        $this->user_mobile = $userMobile;

        return $this;
    }

    /**
     * Get user_mobile
     *
     * @return integer
     */
    public function getUserMobile()
    {
        return $this->user_mobile;
    }

    /**
     * Set user_city
     *
     * @param string $userCity
     * @return userEntity
     */
    public function setUserCity($userCity)
    {
        $this->user_city = $userCity;

        return $this;
    }

    /**
     * Get user_city
     *
     * @return string
     */
    public function getUserCity()
    {
        return $this->user_city;
    }

    /**
     * Set user_accountNumber
     *
     * @param integer $userAccountNumber
     * @return userEntity
     */
    public function setUserAccountNumber($userAccountNumber)
    {
        $this->user_accountNumber = $userAccountNumber;

        return $this;
    }

    /**
     * Get user_accountNumber
     *
     * @return integer
     */
    public function getUserAccountNumber()
    {
        return $this->user_accountNumber;
    }

    /**
     * Set user_cardNumber
     *
     * @param integer $userCardNumber
     * @return userEntity
     */
    public function setUserCardNumber($userCardNumber)
    {
        $this->user_cardNumber = $userCardNumber;

        return $this;
    }

    /**
     * Get user_cardNumber
     *
     * @return integer
     */
    public function getUserCardNumber()
    {
        return $this->user_cardNumber;
    }

    /**
     * Set user_nameBank
     *
     * @param string $userNameBank
     * @return userEntity
     */
    public function setUserNameBank($userNameBank)
    {
        $this->user_nameBank = $userNameBank;

        return $this;
    }

    /**
     * Get user_nameBank
     *
     * @return string
     */
    public function getUserNameBank()
    {
        return $this->user_nameBank;
    }

    /**
     * Set agencyEntity
     *
     * @param agencyEntity $agencyEntity
     * @return userEntity
     */
    public function setAgencyEntity(agencyEntity $agencyEntity = null)
    {
        $this->agencyEntity = $agencyEntity;

        return $this;
    }

    /**
     * Get agencyEntity
     *
     * @return agencyEntity
     */
    public function getAgencyEntity()
    {
        return $this->agencyEntity;
    }

    /**
     * Add bankEntities
     *
     * @param bankEntity $bankEntities
     * @return userEntity
     */
    public function addBankEntitie(bankEntity $bankEntities)
    {
        $this->bankEntities[] = $bankEntities;

        return $this;
    }

    /**
     * Remove bankEntities
     *
     * @param bankEntity $bankEntities
     */
    public function removeBankEntitie(bankEntity $bankEntities)
    {
        $this->bankEntities->removeElement($bankEntities);
    }

    /**
     * Get bankEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBankEntities()
    {
        return $this->bankEntities;
    }

    /**
     * Add moneyEntities
     *
     * @param moneyEntity $moneyEntities
     * @return userEntity
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
     * Add hotelEntities
     *
     * @param hotelEntity $hotelEntities
     * @return userEntity
     */
    public function addHotelEntitie(hotelEntity $hotelEntities)
    {
        $this->hotelEntities[] = $hotelEntities;

        return $this;
    }

    /**
     * Remove hotelEntities
     *
     * @param hotelEntity $hotelEntities
     */
    public function removeHotelEntitie(hotelEntity $hotelEntities)
    {
        $this->hotelEntities->removeElement($hotelEntities);
    }

    /**
     * Get hotelEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHotelEntities()
    {
        return $this->hotelEntities;
    }

    public function __toString()
    {
        return $this->user_firstname . ' ' .$this->user_family. ' ('. $this->username.')';
    }
}