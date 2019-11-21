<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     *  
     * @ORM\JoinColumn(name="user",referencedColumnName="id")
     */    
    private $user;
 

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereservation", type="date" ,nullable=true )
     */
    private $datereservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", length=255,  nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date",  nullable=true)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;


    /**
     * @var string
     *
     * @ORM\Column(name="numtel", type="string", length=255)
     */
    private $numtel;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_passager", type="integer",nullable=true)
     *
     */
     private $nbpassager;

     /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;   

    /**
     * @var string
     *
     * @ORM\Column(name="typeCabinet", type="string", length=255, nullable=true)
     */
    private $typeCabinet;

    /**
     * @var string
     *
     * @ORM\Column(name="typePension", type="string", length=255, nullable=true)
     */
    private $typePension;

    /**
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id",nullable=true)
     */
     private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="Circuit")
     * @ORM\JoinColumn(name="circuit_id", referencedColumnName="id", nullable=true)
     */
    private $circuit;

    /**
     * @ORM\ManyToOne(targetEntity="Excursion")
     * @ORM\JoinColumn(name="excursion_id", referencedColumnName="id",nullable=true)
     */
    private $excursion;
  
     

     /**
     * Convert object to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getHotel()->getNom();
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
     * Set datereservation
     *
     * @param \DateTime $datereservation
     *
     * @return Reservation
     */
    public function setDatereservation($datereservation)
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    /**
     * Get datereservation
     *
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Reservation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Reservation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Reservation
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set numtel
     *
     * @param string $numtel
     *
     * @return Reservation
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;

        return $this;
    }

    /**
     * Get numtel
     *
     * @return string
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * Set nbpassager
     *
     * @param integer $nbpassager
     *
     * @return Reservation
     */
    public function setNbpassager($nbpassager)
    {
        $this->nbpassager = $nbpassager;

        return $this;
    }

    /**
     * Get nbpassager
     *
     * @return integer
     */
    public function getNbpassager()
    {
        return $this->nbpassager;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Reservation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set typeCabinet
     *
     * @param string $typeCabinet
     *
     * @return Reservation
     */
    public function setTypeCabinet($typeCabinet)
    {
        $this->typeCabinet = $typeCabinet;

        return $this;
    }

    /**
     * Get typeCabinet
     *
     * @return string
     */
    public function getTypeCabinet()
    {
        return $this->typeCabinet;
    }

    /**
     * Set typePension
     *
     * @param string $typePension
     *
     * @return Reservation
     */
    public function setTypePension($typePension)
    {
        $this->typePension = $typePension;

        return $this;
    }

    /**
     * Get typePension
     *
     * @return string
     */
    public function getTypePension()
    {
        return $this->typePension;
    }

    /**
     * Set user
     *
     * @param \AdminBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AdminBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set hotel
     *
     * @param \AdminBundle\Entity\Hotel $hotel
     *
     * @return Reservation
     */
    public function setHotel(\AdminBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \AdminBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set circuit
     *
     * @param \AdminBundle\Entity\Circuit $circuit
     *
     * @return Reservation
     */
    public function setCircuit(\AdminBundle\Entity\Circuit $circuit = null)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \AdminBundle\Entity\Circuit
     */
    public function getCircuit()
    {
        return $this->circuit;
    }

    /**
     * Set excursion
     *
     * @param \AdminBundle\Entity\Excursion $excursion
     *
     * @return Reservation
     */
    public function setExcursion(\AdminBundle\Entity\Excursion $excursion = null)
    {
        $this->excursion = $excursion;

        return $this;
    }

    /**
     * Get excursion
     *
     * @return \AdminBundle\Entity\Excursion
     */
    public function getExcursion()
    {
        return $this->excursion;
    }
}
