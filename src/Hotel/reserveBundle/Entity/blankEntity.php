<?php
namespace Hotel\reserveBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blankentity")
 * @ORM\Table(indexes={@ORM\Index(name="date_in_idx", columns={"dateIN"})})
 * @ORM\Table(indexes={@ORM\Index(name="status_idx", columns={"status"})})
 */
class blankEntity
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
    private $dateIN;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $Tariff;

    /**
     * @ORM\ManyToOne(targetEntity="reserveEntity", inversedBy="blankEntities")
     * @ORM\JoinColumn(name="resid", referencedColumnName="id", nullable=true)
     */
    private $reserveEntity;

    /**
     * @ORM\ManyToOne(targetEntity="roomEntity", inversedBy="blankEntities")
     * @ORM\JoinColumn(name="rid", referencedColumnName="id", nullable=false)
     */
    private $roomEntity;

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
     * Set dateIN
     *
     * @param \DateTime $dateIN
     * @return blankEntity
     */
    public function setDateIN($dateIN)
    {
        $this->dateIN = $dateIN;

        return $this;
    }

    /**
     * Get dateIN
     *
     * @return \DateTime
     */
    public function getDateIN()
    {
        return $this->dateIN;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return blankEntity
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Tariff
     *
     * @param integer $tariff
     * @return blankEntity
     */
    public function setTariff($tariff)
    {
        $this->Tariff = $tariff;

        return $this;
    }

    /**
     * Get Tariff
     *
     * @return integer
     */
    public function getTariff()
    {
        return $this->Tariff;
    }

    /**
     * Set reserveEntity
     *
     * @param reserveEntity $reserveEntity
     * @return blankEntity
     */
    public function setReserveEntity(reserveEntity $reserveEntity = null)
    {
        $this->reserveEntity = $reserveEntity;

        return $this;
    }

    /**
     * Get reserveEntity
     *
     * @return \Hotel\reserveBundle\Entity\reserveEntity
     */
    public function getReserveEntity()
    {
        return $this->reserveEntity;
    }

    /**
     * Set roomEntity
     *
     * @param roomEntity $roomEntity
     * @return blankEntity
     */
    public function setRoomEntity(roomEntity $roomEntity)
    {
        $this->roomEntity = $roomEntity;

        return $this;
    }

    /**
     * Get roomEntity
     *
     * @return roomEntity
     */
    public function getRoomEntity()
    {
        return $this->roomEntity;
    }
    public function __tostring()
    {
        return $this->status.'';
    }
}