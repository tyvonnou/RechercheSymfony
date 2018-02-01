<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="typeProjet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeProjetRepository")
 */
class TypeProjet
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_projet_type", type="string", length=255)
     */
    private $nomTypeProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;


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
     * @return TypeProjet
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
     * Set nomTypeProjet
     *
     * @param string $nomTypeProjet
     *
     * @return TypeProjet
     */
    public function setNomTypeProjet($nomTypeProjet)
    {
        $this->nomTypeProjet = $nomTypeProjet;

        return $this;
    }

    /**
     * Get nomTypeProjet
     *
     * @return string
     */
    public function getNomTypeProjet()
    {
        return $this->nomTypeProjet;
    }


    /**
     * Set version
     *
     * @param string $version
     *
     * @return TypeProjet
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

  }
