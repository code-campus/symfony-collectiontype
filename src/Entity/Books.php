<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BooksRepository")
 */
class Books
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cover;

    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\Authors", inversedBy="books", cascade={"persist"})
    //  */
    // private $authors;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BooksPrices")
     */
    private $prices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Authors", inversedBy="books", cascade={"persist"})
     */
    private $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    // public function getAuthors(): ?Authors
    // {
    //     return $this->authors;
    // }

    // public function setAuthors(?Authors $authors): self
    // {
    //     $this->authors = $authors;

    //     return $this;
    // }

    public function getPrices(): ?BooksPrices
    {
        return $this->prices;
    }

    public function setPrices(?BooksPrices $prices): self
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @return Collection|Authors[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Authors $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
            // $this->authors->add($author);
        }

        return $this;
    }

    public function removeAuthor(Authors $author): self
    {
        if ($this->authors->contains($author)) {
            $this->authors->removeElement($author);
        }

        return $this;
    }
}
