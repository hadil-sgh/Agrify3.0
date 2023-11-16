<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MaterielRepository::class)]
#[ApiResource]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[assert\NotBlank(message:"Spécifiez le type du matériel!")]
    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    #[assert\NotBlank(message:"Spécifiez l'état' du matériel!")]
    private ?string $etat = null;

    #[ORM\Column(length: 100)]
    #[assert\NotBlank(message:"Spécifiez la capacité du matériel!")]
    private ?int $capacite_masse = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[assert\NotBlank(message:"Spécifiez la capacité du matériel!")]
    private ?int $capacite_volume = null;

    #[ORM\Column]
    #[assert\NotBlank(message:"Spécifiez le prix du matériel!")]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCapaciteMasse(): ?int
    {
        return $this->capacite_masse;
    }

    public function setCapaciteMasse(int $capacite_masse): static
    {
        $this->capacite_masse = $capacite_masse;

        return $this;
    }

    public function getCapaciteVolume(): ?int
    {
        return $this->capacite_volume;
    }

    public function setCapaciteVolume(?int $capacite_volume): static
    {
        $this->capacite_volume = $capacite_volume;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
