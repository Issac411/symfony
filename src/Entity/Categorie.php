<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Idee", mappedBy="categorie")
     */
    private $idee;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idee = new \Doctrine\Common\Collections\ArrayCollection();
    }

    


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     *
     * @return self
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdee()
    {
        return $this->idee;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idee
     *
     * @return self
     */
    public function setIdee(\Doctrine\Common\Collections\Collection $idee)
    {
        $this->idee = $idee;

        return $this;
    }
}
