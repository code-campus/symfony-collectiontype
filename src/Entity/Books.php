<?php

namespace App\Entity;

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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Authors", inversedBy="books")
     */
    private $authors;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BooksPrices")
     */
    private $prices;

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

    public function getAuthors(): ?Authors
    {
        return $this->authors;
    }

    public function setAuthors(?Authors $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getPrices(): ?BooksPrices
    {
        return $this->prices;
    }

    public function setPrices(?BooksPrices $prices): self
    {
        $this->prices = $prices;

        return $this;
    }
}
