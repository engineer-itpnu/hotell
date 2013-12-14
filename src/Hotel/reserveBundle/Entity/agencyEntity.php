<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agencyentity")
 */
class agencyEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $agency_active;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $agency_name;

    /**
     * @ORM\OneToOne(targetEntity="userEntity", inversedBy="agencyEntity")
     * @ORM\JoinColumn(name="uid", referencedColumnName="id", nullable=false, unique=true)
     */
    private $userEntity;

    /**
     * @ORM\OneToMany(targetEntity="accountEntity", mappedBy="agencyEntity")
     */
    private $accountEntities;

    /**
     * @ORM\OneToMany(targetEntity="reserveEntity", mappedBy="agencyEntity")
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
     * Set agency_active
     *
     * @param boolean $agencyActive
     * @return agencyEntity
     */
    public function setAgencyActive($agencyActive)
    {
        $this->agency_active = $agencyActive;

        return $this;
    }

    /**
     * Get agency_active
     *
     * @return boolean
     */
    public function getAgencyActive()
    {
        return $this->agency_active;
    }

    /**
     * Set agency_name
     *
     * @param string $agencyName
     * @return agencyEntity
     */
    public function setAgencyName($agencyName)
    {
        $this->agency_name = $agencyName;

        return $this;
    }

    /**
     * Get agency_name
     *
     * @return string
     */
    public function getAgencyName()
    {
        return $this->agency_name;
    }

    /**
     * Set userEntity
     *
     * @param \Hotel\reserveBundle\Entity\userEntity $userEntity
     * @return agencyEntity
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

    /**
     * Add accountEntities
     *
     * @param \Hotel\reserveBundle\Entity\accountEntity $accountEntities
     * @return agencyEntity
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
     * @return agencyEntity
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
        return $this->agency_name;
    }
}