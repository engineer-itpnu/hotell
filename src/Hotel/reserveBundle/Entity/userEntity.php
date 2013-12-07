<?php
namespace Hotel\reserveBundle\Entity;
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
     * @ORM\Column(type="string", length=400, nullable=false)
     */
    private $user_firstname;

    /**
     * @ORM\Column(type="string", length=400, nullable=false)
     */
    private $user_family;

    /**
     * @ORM\Column(type="string", length=16, nullable=false)
     */
    private $user_phone;

    /**
     * @ORM\Column(type="string", length=16, nullable=false)
     */
    private $user_mobile;

    /**
     * @ORM\Column(type="string", length=400, nullable=false)
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
     * @ORM\Column(type="string", length=400, nullable=false)
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
        $this->bankEntities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moneyEntities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hotelEntities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Hotel\reserveBundle\Entity\agencyEntity $agencyEntity
     * @return userEntity
     */
    public function setAgencyEntity(\Hotel\reserveBundle\Entity\agencyEntity $agencyEntity = null)
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

    /**
     * Add bankEntities
     *
     * @param \Hotel\reserveBundle\Entity\bankEntity $bankEntities
     * @return userEntity
     */
    public function addBankEntitie(\Hotel\reserveBundle\Entity\bankEntity $bankEntities)
    {
        $this->bankEntities[] = $bankEntities;

        return $this;
    }

    /**
     * Remove bankEntities
     *
     * @param \Hotel\reserveBundle\Entity\bankEntity $bankEntities
     */
    public function removeBankEntitie(\Hotel\reserveBundle\Entity\bankEntity $bankEntities)
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
     * @param \Hotel\reserveBundle\Entity\moneyEntity $moneyEntities
     * @return userEntity
     */
    public function addMoneyEntitie(\Hotel\reserveBundle\Entity\moneyEntity $moneyEntities)
    {
        $this->moneyEntities[] = $moneyEntities;

        return $this;
    }

    /**
     * Remove moneyEntities
     *
     * @param \Hotel\reserveBundle\Entity\moneyEntity $moneyEntities
     */
    public function removeMoneyEntitie(\Hotel\reserveBundle\Entity\moneyEntity $moneyEntities)
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
     * @param \Hotel\reserveBundle\Entity\hotelEntity $hotelEntities
     * @return userEntity
     */
    public function addHotelEntitie(\Hotel\reserveBundle\Entity\hotelEntity $hotelEntities)
    {
        $this->hotelEntities[] = $hotelEntities;

        return $this;
    }

    /**
     * Remove hotelEntities
     *
     * @param \Hotel\reserveBundle\Entity\hotelEntity $hotelEntities
     */
    public function removeHotelEntitie(\Hotel\reserveBundle\Entity\hotelEntity $hotelEntities)
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
    public function __tostring()
    {
        return $this->username . '@' .$this->user_family. '';
    }
}