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
    private ?string $espece = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column(nullable: true)]
    private ?float $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?NutritionalNeeds $nutritionalNeeds = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Ration $ration = null;

    #[ORM\OneToOne(inversedBy: 'animal', cascade: ['persist', 'remove'])]
    private ?Gestation $gestation = null;

    #[ORM\Column(length: 255)]
    private ?string $unitAnimal = null;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getNutritionalNeeds(): ?NutritionalNeeds
    {
        return $this->nutritionalNeeds;
    }

    public function setNutritionalNeeds(?NutritionalNeeds $nutritionalNeeds): static
    {
        $this->nutritionalNeeds = $nutritionalNeeds;

        return $this;
    }

    public function getRation(): ?Ration
    {
        return $this->ration;
    }

    public function setRation(?Ration $ration): static
    {
        $this->ration = $ration;

        return $this;
    }

    public function getGestation(): ?Gestation
    {
        return $this->gestation;
    }

    public function setGestation(?Gestation $gestation): static
    {
        $this->gestation = $gestation;

        return $this;
    }

    public function getUnitAnimal(): ?string
    {
        return $this->unitAnimal;
    }

    public function setUnitAnimal(string $unitAnimal): static
    {
        $this->unitAnimal = $unitAnimal;

        return $this;
    }
    
}
