<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Promotions
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\PromotionRepository")
 */
class Promotion
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
     * @ORM\ManyToOne(targetEntity="hotel")
     * @Assert\NotBlank()
     * @ORM\JoinColumn(name="hotel",referencedColumnName="id")
     */
    private $hotel;

   /**
     * @ORM\ManyToOne(targetEntity="circuit")
     * @Assert\NotBlank()
     * @ORM\JoinColumn(name="circuit",referencedColumnName="id")
     */
    private $circuit;

   /**
     * @ORM\ManyToOne(targetEntity="excursion")
     * @Assert\NotBlank()
     * @ORM\JoinColumn(name="excursion",referencedColumnName="id")
     */
    private $excursion;

    
    /**
     * @var int
     *
     * @ORM\Column(name="tarifs_promotion", type="integer")
     */
    private $tarifsPromotion;
    
    /**
     * @var int
     *
     * @ORM\Column(name="pourcentage", type="integer")
     */
    private $pourcentage;

 



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
     * Set tarifsPromotion
     *
     * @param integer $tarifsPromotion
     *
     * @return Promotion
     */
    public function setTarifsPromotion($tarifsPromotion)
    {
        $this->tarifsPromotion = $tarifsPromotion;

        return $this;
    }

    /**
     * Get tarifsPromotion
     *
     * @return integer
     */
    public function getTarifsPromotion()
    {
        return $this->tarifsPromotion;
    }

    /**
     * Set pourcentage
     *
     * @param integer $pourcentage
     *
     * @return Promotion
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return integer
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set hotel
     *
     * @param \AdminBundle\Entity\hotel $hotel
     *
     * @return Promotion
     */
    public function setHotel(\AdminBundle\Entity\hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \AdminBundle\Entity\hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set circuit
     *
     * @param \AdminBundle\Entity\circuit $circuit
     *
     * @return Promotion
     */
    public function setCircuit(\AdminBundle\Entity\circuit $circuit = null)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \AdminBundle\Entity\circuit
     */
    public function getCircuit()
    {
        return $this->circuit;
    }

    /**
     * Set excursion
     *
     * @param \AdminBundle\Entity\excursion $excursion
     *
     * @return Promotion
     */
    public function setExcursion(\AdminBundle\Entity\excursion $excursion = null)
    {
        $this->excursion = $excursion;

        return $this;
    }

    /**
     * Get excursion
     *
     * @return \AdminBundle\Entity\excursion
     */
    public function getExcursion()
    {
        return $this->excursion;
    }
}
