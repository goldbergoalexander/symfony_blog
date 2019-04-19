<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autor;

    /**
     * @ORM\Column(type="integer")
     */
    private $dates;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $data;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dates1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $data_summary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getDates(): ?int
    {
        return $this->dates;
    }

    public function setDates(int $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getDates1(): ?\DateTimeInterface
    {
        return $this->dates1;
    }

    public function setDates1(\DateTimeInterface $dates1): self
    {
        $this->dates1 = $dates1;

        return $this;
    }

    public function getDataSummary(): ?string
    {
        return $this->data_summary;
    }

    public function setDataSummary(?string $data_summary): self
    {
        $this->data_summary = $data_summary;

        return $this;
    }
}
