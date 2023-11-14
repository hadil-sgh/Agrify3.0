<?php

namespace App\Entity;

use App\Repository\NutritionalNeedsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'nutritionalNeeds', targetEntity: Animal::class)]
    private Collection $animals;

    #[ORM\OneToOne(mappedBy: 'nutritionalNeeds', cascade: ['persist', 'remove'])]
    private ?NutritionalValueNeeds $nutritionalValueNeeds = null;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setNutritionalNeeds($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getNutritionalNeeds() === $this) {
                $animal->setNutritionalNeeds(null);
            }
        }

        return $this;
    }

    public function getNutritionalValueNeeds(): ?NutritionalValueNeeds
    {
        return $this->nutritionalValueNeeds;
    }

    public function setNutritionalValueNeeds(?NutritionalValueNeeds $nutritionalValueNeeds): static
    {
        // unset the owning side of the relation if necessary
        if ($nutritionalValueNeeds === null && $this->nutritionalValueNeeds !== null) {
            $this->nutritionalValueNeeds->setNutritionalNeeds(null);
        }

        // set the owning side of the relation if necessary
        if ($nutritionalValueNeeds !== null && $nutritionalValueNeeds->getNutritionalNeeds() !== $this) {
            $nutritionalValueNeeds->setNutritionalNeeds($this);
        }

        $this->nutritionalValueNeeds = $nutritionalValueNeeds;

        return $this;
    }
}
