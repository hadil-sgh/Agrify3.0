<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $especeAnimal = null;

    #[ORM\Column(length: 255)]
    private ?string $sexeRation = null;

    #[ORM\Column]
    private ?float $poidsmaxRation = null;

    #[ORM\Column]
    private ?float $poidsminRation = null;

    #[ORM\Column(length: 255)]
    private ?string $ageAnimal = null;

    #[ORM\Column]
    private ?int $nombreAnimal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspeceAnimal(): ?string
    {
        return $this->especeAnimal;
    }

    public function setEspeceAnimal(string $especeAnimal): static
    {
        $this->especeAnimal = $especeAnimal;

        return $this;
    }

    public function getSexeRation(): ?string
    {
        return $this->sexeRation;
    }

    public function setSexeRation(string $sexeRation): static
    {
        $this->sexeRation = $sexeRation;

        return $this;
    }

    public function getPoidsmaxRation(): ?float
    {
        return $this->poidsmaxRation;
    }

    public function setPoidsmaxRation(float $poidsmaxRation): static
    {
        $this->poidsmaxRation = $poidsmaxRation;

        return $this;
    }

    public function getPoidsminRation(): ?float
    {
        return $this->poidsminRation;
    }

    public function setPoidsminRation(float $poidsminRation): static
    {
        $this->poidsminRation = $poidsminRation;

        return $this;
    }

    public function getAgeAnimal(): ?string
    {
        return $this->ageAnimal;
    }

    public function setAgeAnimal(string $ageAnimal): static
    {
        $this->ageAnimal = $ageAnimal;

        return $this;
    }

    public function getNombreAnimal(): ?int
    {
        return $this->nombreAnimal;
    }

    public function setNombreAnimal(int $nombreAnimal): static
    {
        $this->nombreAnimal = $nombreAnimal;

        return $this;
    }
}
