<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MaladieRepository::class)]
class Maladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"L'identifiant ne doit pas être vide")]
    #[Assert\Regex(
        pattern: '/^\d+$/',
        message: "Le nom du type doit contenir uniquement des chiffres"
    )]
    private ?string $animalId = null;



    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Le medicament ne doit pas être vide")]
    private ?string $medicament = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Le type de traitement ne doit pas être vide")]
    private ?string $typeDeTraitement = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Le dosage ne doit pas être vide")]
    private ?string $dosage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimalId(): ?string
    {
        return $this->animalId;
    }

    public function setAnimalId(string $animalId): static
    {
        $this->animalId = $animalId;

        return $this;
    }



    public function getMedicament(): ?string
    {
        return $this->medicament;
    }

    public function setMedicament(string $medicament): static
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getTypeDeTraitement(): ?string
    {
        return $this->typeDeTraitement;
    }

    public function setTypeDeTraitement(string $typeDeTraitement): static
    {
        $this->typeDeTraitement = $typeDeTraitement;

        return $this;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(string $dosage): static
    {
        $this->dosage = $dosage;

        return $this;
    }
}
