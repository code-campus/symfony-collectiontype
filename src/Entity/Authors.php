<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorsRepository")
 */
class Authors
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $nickname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Books", mappedBy="authors")
     */
    private $books;

    // /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\Books", mappedBy="authors")
    //  */
    // private $books;

    public function __construct()
    {
        // $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return Collection|Books[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Books $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->addAuthor($this);
        }

        return $this;
    }

    public function removeBook(Books $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            $book->removeAuthor($this);
        }

        return $this;
    }

    // /**
    //  * @return Collection|Books[]
    //  */
    // public function getBooks(): Collection
    // {
    //     return $this->books;
    // }

    // public function addBook(Books $book): self
    // {
    //     if (!$this->books->contains($book)) {
    //         $this->books[] = $book;
    //         $book->setAuthors($this);
    //     }

    //     return $this;
    // }

    // public function removeBook(Books $book): self
    // {
    //     if ($this->books->contains($book)) {
    //         $this->books->removeElement($book);
    //         // set the owning side to null (unless already changed)
    //         if ($book->getAuthors() === $this) {
    //             $book->setAuthors(null);
    //         }
    //     }

    //     return $this;
    // }
}
