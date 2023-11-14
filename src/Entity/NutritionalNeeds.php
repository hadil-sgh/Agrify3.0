<?php

namespace App\Entity;

use App\Repository\NutritionalNeedsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionalNeedsRepository::class)]
class NutritionalNeeds
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $speciesNeeds = null;

    #[ORM\Column(length: 255)]
    private ?string $productionStatusNeeds = null;

    #[ORM\Column(length: 255)]
    private ?string $sexNeeds = null;
   
    #[ORM\Column]
    private ?float $minimumWeightNeeds = null;

    #[ORM\Column]
    private ?float $maximumWeightNeeds = null;

    #[ORM\Column(length: 255)]
    private ?string $productionGoalNeeds = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeciesNeeds(): ?string
    {
        return $this->speciesNeeds;
    }

    public function setSpeciesNeeds(string $speciesNeeds): static
    {
        $this->speciesNeeds = $speciesNeeds;

        return $this;
    }

    public function getProductionStatusNeeds(): ?string
    {
        return $this->productionStatusNeeds;
    }

    public function setProductionStatusNeeds(string $productionStatusNeeds): static
    {
        $this->productionStatusNeeds = $productionStatusNeeds;

        return $this;
    }

    public function getSexNeeds(): ?string
    {
        return $this->sexNeeds;
    }

    public function setSexNeeds(string $sexNeeds): static
    {
        $this->sexNeeds = $sexNeeds;

        return $this;
    }

    
    public function getMinimumWeightNeeds(): ?float
    {
        return $this->minimumWeightNeeds;
    }

    public function setMinimumWeightNeeds(float $minimumWeightNeeds): static
    {
        $this->minimumWeightNeeds = $minimumWeightNeeds;

        return $this;
    }

    public function getMaximumWeightNeeds(): ?float
    {
        return $this->maximumWeightNeeds;
    }

    public function setMaximumWeightNeeds(float $maximumWeightNeeds): static
    {
        $this->maximumWeightNeeds = $maximumWeightNeeds;

        return $this;
    }

    public function getProductionGoalNeeds(): ?string
    {
        return $this->productionGoalNeeds;
    }

    public function setProductionGoalNeeds(string $productionGoalNeeds): static
    {
        $this->productionGoalNeeds = $productionGoalNeeds;

        return $this;
    }
}
