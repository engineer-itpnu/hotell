<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $cust_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $cust_family;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $cust_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $cust_phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
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
        $this->accountEntities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Hotel\reserveBundle\Entity\accountEntity $accountEntities
     * @return customerEntity
     */
    public function addAccountEntitie(\Hotel\reserveBundle\Entity\accountEntity $accountEntities)
    {
        $this->accountEntities[] = $accountEntities;

        return $this;
    }

    /**
     * Remove accountEntities
     *
     * @param \Hotel\reserveBundle\Entity\accountEntity $accountEntities
     */
    public function removeAccountEntitie(\Hotel\reserveBundle\Entity\accountEntity $accountEntities)
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
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     * @return customerEntity
     */
    public function addReserveEntitie(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntities)
    {
        $this->reserveEntities[] = $reserveEntities;

        return $this;
    }

    /**
     * Remove reserveEntities
     *
     * @param \Hotel\reserveBundle\Entity\reserveEntity $reserveEntities
     */
    public function removeReserveEntitie(\Hotel\reserveBundle\Entity\reserveEntity $reserveEntities)
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
    public function __tostring()
    {
        return $this->cust_name . ' ';
    }
}