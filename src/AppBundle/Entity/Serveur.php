<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveur
 *
 * @ORM\Table(name="serveur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServeurRepository")
 */
class Serveur
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
     * @ORM\Column(name="nom_serveur", type="string", length=255)
     */
    private $nomServeur;


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
     * @return Serveur
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
     * Set nomServeur
     *
     * @param string $nomServeur
     *
     * @return Serveur
     */
    public function setNomServeur($nomServeur)
    {
        $this->nomServeur = $nomServeur;

        return $this;
    }

    /**
     * Get nomServeur
     *
     * @return string
     */
    public function getNomServeur()
    {
        return $this->nomServeur;
    }
}

