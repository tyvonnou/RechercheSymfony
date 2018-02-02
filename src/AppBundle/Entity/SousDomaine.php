<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="sousdomaine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\sousDomaineRepository")
 */
class SousDomaine
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Domaine")
     * @ORM\JoinColumn(nullable=false)
     */
     private $domaine;

     /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projet",
      *      inversedBy="sousdomaines")
      * @ORM\JoinColumn(nullable=false)
      */
      protected $projet;

      /**
       * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Hebergement")
       * @ORM\JoinColumn(nullable=false)
       */
       private $hebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_projet", type="string", length=255)
     */
    private $nomSousDomaine;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Projet
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nomSousDomaine
     *
     * @param string $nomSousDomaine
     *
     * @return Projet
     */
    public function setNomSousDomaine($nomSousDomaine)
    {
        $this->nomSousDomaine = $nomSousDomaine;

        return $this;
    }

    /**
     * Get nomSousDomaine
     *
     * @return string
     */
    public function getNomSousDomaine()
    {
        return $this->nomSousDomaine;
    }

    /**
     * Set domaine
     *
     * @param \AppBundle\Entity\Domaine $domaine
     *
     * @return Projet
     */
    public function setDomaine(\AppBundle\Entity\Domaine $domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \AppBundle\Entity\Domaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set projet
     *
     * @param \AppBundle\Entity\Projet $projet
     *
     * @return Projet
     */
    public function setProjet(\AppBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get Projet
     *
     * @return \AppBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set hebergement
     *
     * @param \AppBundle\Entity\Hebergement $hebergement
     *
     * @return Hebergement
     */
    public function setHebergement(\AppBundle\Entity\Projet $hebergement)
    {
        $this->hebergement = $hebergement;

        return $this;
    }

    /**
     * Get Hebergement
     *
     * @return \AppBundle\Entity\Hebergement
     */
    public function getHebergement()
    {
        return $this->hebergement;
    }
}
