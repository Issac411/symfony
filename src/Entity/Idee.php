<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idee
 *
 * @ORM\Table(name="idee")
 * @ORM\Entity
 */
class Idee
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
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=150, nullable=true)
     */
    private $author;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var bool
     *
     * @ORM\Column(name="ispublished", type="boolean", nullable=false)
     */
    private $ispublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorie", inversedBy="idee")
     * @ORM\JoinTable(name="idee_categorie",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idee_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     *   }
     * )
     */
    private $categorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime|null $dateCreated
     *
     * @return self
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIspublished()
    {
        return $this->ispublished;
    }

    /**
     * @param bool $ispublished
     *
     * @return self
     */
    public function setIspublished($ispublished)
    {
        $this->ispublished = $ispublished;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     *
     * @return self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int|null $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $categorie
     *
     * @return self
     */
    public function setCategorie(\Doctrine\Common\Collections\Collection $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
