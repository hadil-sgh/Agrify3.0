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
    private ?string $speciesNutritionalNeeds = null;

    #[ORM\Column(length: 255)]
    private ?string $productionStatus = null;

    #[ORM\Column(length: 255)]
    private ?string $sex = null;

    #[ORM\Column]
    private ?float $minimumWeight = null;

    #[ORM\Column]
    private ?float $maximumWeight = null;

    #[ORM\Column(length: 255)]
    private ?string $productionGoal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeciesNutritionalNeeds(): ?string
    {
        return $this->speciesNutritionalNeeds;
    }

    public function setSpeciesNutritionalNeeds(string $speciesNutritionalNeeds): static
    {
        $this->speciesNutritionalNeeds = $speciesNutritionalNeeds;

        return $this;
    }

    public function getProductionStatus(): ?string
    {
        return $this->productionStatus;
    }

    public function setProductionStatus(string $productionStatus): static
    {
        $this->productionStatus = $productionStatus;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getMinimumWeight(): ?float
    {
        return $this->minimumWeight;
    }

    public function setMinimumWeight(float $minimumWeight): static
    {
        $this->minimumWeight = $minimumWeight;

        return $this;
    }

    public function getMaximumWeight(): ?float
    {
        return $this->maximumWeight;
    }

    public function setMaximumWeight(float $maximumWeight): static
    {
        $this->maximumWeight = $maximumWeight;

        return $this;
    }

    public function getProductionGoal(): ?string
    {
        return $this->productionGoal;
    }

    public function setProductionGoal(string $productionGoal): static
    {
        $this->productionGoal = $productionGoal;

        return $this;
    }
}
