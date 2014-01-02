<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="reserveentity")
 * @ORM\Table(indexes={@ORM\Index(name="Date_inp_idx", columns={"DateInp"})})
 * @ORM\Table(indexes={@ORM\Index(name="CodePey_idx", columns={"CodePey"})})
 * @ORM\Table(indexes={@ORM\Index(name="Voucher_idx", columns={"Voucher"})})
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
    private $DateCreate;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $DateInp;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $CountNight;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    private $Money;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $CodePey;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Voucher;

    /**
     * @ORM\OneToMany(targetEntity="accountEntity", mappedBy="reserveEntity")
     */
    private $accountEntities;

    /**
     * @ORM\OneToMany(targetEntity="blankEntity", mappedBy="reserveEntity")
     */
    private $blankEntities;

    /**
     * @ORM\ManyToOne(targetEntity="customerEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="cid", referencedColumnName="id", nullable=true)
     */
    private $customerEntity;

    /**
     * @ORM\ManyToOne(targetEntity="agencyEntity", inversedBy="reserveEntities")
     * @ORM\JoinColumn(name="aid", referencedColumnName="id", nullable=true)
     */
    private $agencyEntity;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accountEntities = new ArrayCollection();
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
     * Set DateInp
     *
     * @param \DateTime $dateInp
     * @return reserveEntity
     */
    public function setDateInp($dateInp)
    {
        $this->DateInp = $dateInp;

        return $this;
    }

    /**
     * Get DateInp
     *
     * @return \DateTime
     */
    public function getDateInp()
    {
        return $this->DateInp;
    }

    /**
     * Set CountNight
     *
     * @param integer $countNight
     * @return reserveEntity
     */
    public function setCountNight($countNight)
    {
        $this->CountNight = $countNight;

        return $this;
    }

    /**
     * Get CountNight
     *
     * @return integer
     */
    public function getCountNight()
    {
        return $this->CountNight;
    }

    /**
     * Set Money
     *
     * @param integer $money
     * @return reserveEntity
     */
    public function setMoney($money)
    {
        $this->Money = $money;

        return $this;
    }

    /**
     * Get Money
     *
     * @return integer
     */
    public function getMoney()
    {
        return $this->Money;
    }

    /**
     * Set CodePey
     *
     * @param string $codePey
     * @return reserveEntity
     */
    public function setCodePey($codePey)
    {
        $this->CodePey = $codePey;

        return $this;
    }

    /**
     * Get CodePey
     *
     * @return string
     */
    public function getCodePey()
    {
        return $this->CodePey;
    }

    /**
     * Set Voucher
     *
     * @param string $voucher
     * @return reserveEntity
     */
    public function setVoucher($voucher)
    {
        $this->Voucher = $voucher;

        return $this;
    }

    /**
     * Get Voucher
     *
     * @return string
     */
    public function getVoucher()
    {
        return $this->Voucher;
    }

    /**
     * Add accountEntities
     *
     * @param accountEntity $accountEntities
     * @return reserveEntity
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
     * Add blankEntities
     *
     * @param blankEntity $blankEntities
     * @return reserveEntity
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
     * Set customerEntity
     *
     * @param customerEntity $customerEntity
     * @return reserveEntity
     */
    public function setCustomerEntity(customerEntity $customerEntity)
    {
        $this->customerEntity = $customerEntity;

        return $this;
    }

    /**
     * Get customerEntity
     *
     * @return customerEntity
     */
    public function getCustomerEntity()
    {
        return $this->customerEntity;
    }

    /**
     * Set agencyEntity
     *
     * @param agencyEntity $agencyEntity
     * @return reserveEntity
     */
    public function setAgencyEntity(agencyEntity $agencyEntity)
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
     * Set DateCreate
     *
     * @param \DateTime $dateCreate
     * @return reserveEntity
     */
    public function setDateCreate($dateCreate)
    {
        $this->DateCreate = $dateCreate;
    
        return $this;
    }

    /**
     * Get DateCreate
     *
     * @return \DateTime 
     */
    public function getDateCreate()
    {
        return $this->DateCreate;
    }

    public function __toString()
    {
        return $this->CountNight . '';
    }
}