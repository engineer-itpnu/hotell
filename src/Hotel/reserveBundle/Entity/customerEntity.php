<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customerentity")
 */
class customerEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $cust_name;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $cust_family;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    private $cust_email;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $cust_phone;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $cust_mobile;

    /**
     * @ORM\OneToMany(targetEntity="accountEntity", mappedBy="customerEntity")
     */
    private $accountEntities;

    /**
     * @ORM\OneToMany(targetEntity="reserveEntity", mappedBy="customerEntity")
     */
    private $reserveEntities;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accountEntities = new ArrayCollection();
        $this->reserveEntities = new ArrayCollection();
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
     * Set cust_name
     *
     * @param string $custName
     * @return customerEntity
     */
    public function setCustName($custName)
    {
        $this->cust_name = $custName;

        return $this;
    }

    /**
     * Get cust_name
     *
     * @return string
     */
    public function getCustName()
    {
        return $this->cust_name;
    }

    /**
     * Set cust_family
     *
     * @param string $custFamily
     * @return customerEntity
     */
    public function setCustFamily($custFamily)
    {
        $this->cust_family = $custFamily;

        return $this;
    }

    /**
     * Get cust_family
     *
     * @return string
     */
    public function getCustFamily()
    {
        return $this->cust_family;
    }

    /**
     * Set cust_email
     *
     * @param string $custEmail
     * @return customerEntity
     */
    public function setCustEmail($custEmail)
    {
        $this->cust_email = $custEmail;

        return $this;
    }

    /**
     * Get cust_email
     *
     * @return string
     */
    public function getCustEmail()
    {
        return $this->cust_email;
    }

    /**
     * Set cust_phone
     *
     * @param integer $custPhone
     * @return customerEntity
     */
    public function setCustPhone($custPhone)
    {
        $this->cust_phone = $custPhone;

        return $this;
    }

    /**
     * Get cust_phone
     *
     * @return integer
     */
    public function getCustPhone()
    {
        return $this->cust_phone;
    }

    /**
     * Set cust_mobile
     *
     * @param integer $custMobile
     * @return customerEntity
     */
    public function setCustMobile($custMobile)
    {
        $this->cust_mobile = $custMobile;

        return $this;
    }

    /**
     * Get cust_mobile
     *
     * @return integer
     */
    public function getCustMobile()
    {
        return $this->cust_mobile;
    }

    /**
     * Add accountEntities
     *
     * @param accountEntity $accountEntities
     * @return customerEntity
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
     * Add reserveEntities
     *
     * @param reserveEntity $reserveEntities
     * @return customerEntity
     */
    public function addReserveEntitie(reserveEntity $reserveEntities)
    {
        $this->reserveEntities[] = $reserveEntities;

        return $this;
    }

    /**
     * Remove reserveEntities
     *
     * @param reserveEntity $reserveEntities
     */
    public function removeReserveEntitie(reserveEntity $reserveEntities)
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

    public function __toString()
    {
        return $this->cust_name . ' '. $this->cust_family;
    }
}