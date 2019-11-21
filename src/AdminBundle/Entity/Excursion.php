<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AdminBundle\Entity\Offre;

/**
 * Excursion
 *
 * @ORM\Table(name="excursion")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ExcursionRepository")
 */
class Excursion 
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
     * @ORM\Column(name="lieuDepart", type="string", length=255,  nullable=true)
     */
    private $lieuDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuArrive", type="string", length=255, nullable=true)
     */
    private $lieuArrive;

     

    /**
     * @var string
     *
     * @ORM\Column(name="tarifs", type="string", length=255, nullable=true)
     */
    private $tarifs;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255,  nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255,  nullable=true)
     */
    private $description;

  

    

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Excursion
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
     * @return Excursion
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
     * Set lieuDepart
     *
     * @param string $lieuDepart
     *
     * @return Excursion
     */
    public function setLieuDepart($lieuDepart)
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    /**
     * Get lieuDepart
     *
     * @return string
     */
    public function getLieuDepart()
    {
        return $this->lieuDepart;
    }

    /**
     * Set lieuArrive
     *
     * @param string $lieuArrive
     *
     * @return Excursion
     */
    public function setLieuArrive($lieuArrive)
    {
        $this->lieuArrive = $lieuArrive;

        return $this;
    }

    /**
     * Get lieuArrive
     *
     * @return string
     */
    public function getLieuArrive()
    {
        return $this->lieuArrive;
    }

    /**
     * Set tarifs
     *
     * @param string $tarifs
     *
     * @return Excursion
     */
    public function setTarifs($tarifs)
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    /**
     * Get tarifs
     *
     * @return string
     */
    public function getTarifs()
    {
        return $this->tarifs;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Excursion
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Excursion
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Convert object to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getLieuDepart()." <->".$this->getLieuArrive();
    }

}
