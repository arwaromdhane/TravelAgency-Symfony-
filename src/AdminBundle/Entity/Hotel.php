<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AdminBundle\Entity\Offre;

/**
 * Hotels
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\HotelRepository")
 */
class Hotel  
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nbr_etoile", type="string", length=255)
     */
    private $nbrEtoile; 
     
    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;     

    /**
     * @var float
     *
     * @ORM\Column(name="tariLpd", type="float", length=255, nullable=true)
     */
    private $tariLpd;

     /**
     * @var float
     *
     * @ORM\Column(name="tarifPc", type="float", length=255, nullable=true)
     */
    private $tarifPc;

     /**
     * @var float
     *
     * @ORM\Column(name="tarifsDp", type="float", length=255, nullable=true)
     */
    private $tarifsDp;
     /**
     * @var float
     *
     * @ORM\Column(name="all_soft", type="float", length=255, nullable=true)
     */
    private $all_soft;
     /**
     * @var float
     *
     * @ORM\Column(name="taridAllIn", type="float", length=255, nullable=true)
     */
    private $taridAllIn; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=255)
     */
    private $num_tel;  
  
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255,  nullable=true)
     */
    private $image;
     

 
 


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Hotel
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbrEtoile
     *
     * @param string $nbrEtoile
     *
     * @return Hotel
     */
    public function setNbrEtoile($nbrEtoile)
    {
        $this->nbrEtoile = $nbrEtoile;

        return $this;
    }

    /**
     * Get nbrEtoile
     *
     * @return string
     */
    public function getNbrEtoile()
    {
        return $this->nbrEtoile;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Hotel
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set tariLpd
     *
     * @param float $tariLpd
     *
     * @return Hotel
     */
    public function setTariLpd($tariLpd)
    {
        $this->tariLpd = $tariLpd;

        return $this;
    }

    /**
     * Get tariLpd
     *
     * @return float
     */
    public function getTariLpd()
    {
        return $this->tariLpd;
    }

    /**
     * Set tarifPc
     *
     * @param float $tarifPc
     *
     * @return Hotel
     */
    public function setTarifPc($tarifPc)
    {
        $this->tarifPc = $tarifPc;

        return $this;
    }

    /**
     * Get tarifPc
     *
     * @return float
     */
    public function getTarifPc()
    {
        return $this->tarifPc;
    }

    /**
     * Set tarifsDp
     *
     * @param float $tarifsDp
     *
     * @return Hotel
     */
    public function setTarifsDp($tarifsDp)
    {
        $this->tarifsDp = $tarifsDp;

        return $this;
    }

    /**
     * Get tarifsDp
     *
     * @return float
     */
    public function getTarifsDp()
    {
        return $this->tarifsDp;
    }

    /**
     * Set allSoft
     *
     * @param float $allSoft
     *
     * @return Hotel
     */
    public function setAllSoft($allSoft)
    {
        $this->all_soft = $allSoft;

        return $this;
    }

    /**
     * Get allSoft
     *
     * @return float
     */
    public function getAllSoft()
    {
        return $this->all_soft;
    }

    /**
     * Set taridAllIn
     *
     * @param float $taridAllIn
     *
     * @return Hotel
     */
    public function setTaridAllIn($taridAllIn)
    {
        $this->taridAllIn = $taridAllIn;

        return $this;
    }

    /**
     * Get taridAllIn
     *
     * @return float
     */
    public function getTaridAllIn()
    {
        return $this->taridAllIn;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Hotel
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return Hotel
     */
    public function setNumTel($numTel)
    {
        $this->num_tel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->num_tel;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Hotel
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
     * Convert object to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNom();
    }
 
}
