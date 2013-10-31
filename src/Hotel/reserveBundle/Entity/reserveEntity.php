<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(type="date", nullable=false)
     */
    private $DateInp;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $CountNight;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $Money;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $CodePey;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
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
        $this->accountEntities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blankEntities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param integer $codePey
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
     * @return integer
     */
    public function getCodePey()
    {
        return $this->CodePey;
    }

    /**
     * Set Voucher
     *
     * @param integer $voucher
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
     * @return integer
     */
    public function getVoucher()
    {
        return $this->Voucher;
    }

    /**
     * Add accountEntities
     *
     * @param \Hotel\reserveBundle\Entity\accountEntity $accountEntities
     * @return reserveEntity
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
     * Add blankEntities
     *
     * @param \Hotel\reserveBundle\Entity\blankEntity $blankEntities
     * @return reserveEntity
     */
    public function addBlankEntitie(\Hotel\reserveBundle\Entity\blankEntity $blankEntities)
    {
        $this->blankEntities[] = $blankEntities;

        return $this;
    }

    /**
     * Remove blankEntities
     *
     * @param \Hotel\reserveBundle\Entity\blankEntity $blankEntities
     */
    public function removeBlankEntitie(\Hotel\reserveBundle\Entity\blankEntity $blankEntities)
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
     * @param \Hotel\reserveBundle\Entity\customerEntity $customerEntity
     * @return reserveEntity
     */
    public function setCustomerEntity(\Hotel\reserveBundle\Entity\customerEntity $customerEntity)
    {
        $this->customerEntity = $customerEntity;

        return $this;
    }

    /**
     * Get customerEntity
     *
     * @return \Hotel\reserveBundle\Entity\customerEntity
     */
    public function getCustomerEntity()
    {
        return $this->customerEntity;
    }

    /**
     * Set agencyEntity
     *
     * @param \Hotel\reserveBundle\Entity\agencyEntity $agencyEntity
     * @return reserveEntity
     */
    public function setAgencyEntity(\Hotel\reserveBundle\Entity\agencyEntity $agencyEntity)
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
    public function __tostring()
    {
        return $this->CountNight . ' ';
    }
}