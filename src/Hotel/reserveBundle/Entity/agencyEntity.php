<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="string", length=63, nullable=false)
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
     * @param userEntity $userEntity
     * @return agencyEntity
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

    /**
     * Add accountEntities
     *
     * @param accountEntity $accountEntities
     * @return agencyEntity
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
     * @return agencyEntity
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
        return $this->agency_name;
    }
}