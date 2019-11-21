<?php


namespace AdminBundle\Entity;
use AdminBundle\Entity\Offre;
use Doctrine\ORM\Mapping as ORM;

/**
 * Circuit
 *
 * @ORM\Table(name="circuit")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CircuitRepository")
 */
class Circuit
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
     * @var int
     *
     * @ORM\Column(name="passager", type="integer")
     */
     private $passager;  

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
     * @var int
     *
     * @ORM\Column(name="tarifs", type="integer")
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
     * Set passager
     *
     * @param integer $passager
     *
     * @return Circuit
     */
    public function setPassager($passager)
    {
        $this->passager = $passager;

        return $this;
    }

    /**
     * Get passager
     *
     * @return integer
     */
    public function getPassager()
    {
        return $this->passager;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Circuit
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
     * @return Circuit
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
     * @return Circuit
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
     * @return Circuit
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
     * @param integer $tarifs
     *
     * @return Circuit
     */
    public function setTarifs($tarifs)
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    /**
     * Get tarifs
     *
     * @return integer
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
     * @return Circuit
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
     * @return Circuit
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
}
