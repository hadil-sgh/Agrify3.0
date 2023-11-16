<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieRepository::class)]
class Maladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $animalId = null;



    #[ORM\Column(length: 255)]
    private ?string $medicament = null;

    #[ORM\Column(length: 255)]
    private ?string $typeDeTraitement = null;

    #[ORM\Column(length: 255)]
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
