<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hebergement
 *
 * @ORM\Table(name="hebergement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HebergementRepository")
 */
class Hebergement
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projet")
     * @ORM\JoinColumn(nullable=false)
     */
     private $projet;

     /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Serveur")
      * @ORM\JoinColumn(nullable=false)
      */
      private $serveur;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_hebergement", type="string", length=255)
     */
    private $nomHebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


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
     * @return Hebergement
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
     * Set version
     *
     * @param string $version
     *
     * @return Hebergement
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set nomHebergement
     *
     * @param string $nomHebergement
     *
     * @return Hebergement
     */
    public function setNomHebergement($nomHebergement)
    {
        $this->nomHebergement = $nomHebergement;

        return $this;
    }

    /**
     * Get nomHebergement
     *
     * @return string
     */
    public function getNomHebergement()
    {
        return $this->nomHebergement;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Hebergement
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set projet
     *
     * @param \AppBundle\Entity\Projet $projet
     *
     * @return Hebergement
     */
    public function setProjet(\AppBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \AppBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set serveur
     *
     * @param \AppBundle\Entity\Serveur $serveur
     *
     * @return Hebergement
     */
    public function setServeur(\AppBundle\Entity\Serveur $serveur)
    {
        $this->serveur = $serveur;

        return $this;
    }

    /**
     * Get serveur
     *
     * @return \AppBundle\Entity\Serveur
     */
    public function getServeur()
    {
        return $this->serveur;
    }
}
