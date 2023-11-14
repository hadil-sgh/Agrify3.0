<?php

namespace App\Entity;

use App\Repository\RationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RationRepository::class)]
class Ration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $especeRation = null;

    #[ORM\Column(length: 255)]
    private ?string $statutRation = null;

    #[ORM\Column(length: 255)]
    private ?string $sexeRation = null;

    #[ORM\Column]
    private ?float $poidsMinRation = null;

    #[ORM\Column]
    private ?float $poidsMaxRation = null;

    #[ORM\Column(length: 255)]
    private ?string $buteProductionRation = null;

    #[ORM\OneToMany(mappedBy: 'ration', targetEntity: Animal::class)]
    private Collection $animals;

    #[ORM\OneToMany(mappedBy: 'ration', targetEntity: Ingredient::class)]
    private Collection $ingredients;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspeceRation(): ?string
    {
        return $this->especeRation;
    }

    public function setEspeceRation(string $especeRation): static
    {
        $this->especeRation = $especeRation;

        return $this;
    }

    public function getStatutRation(): ?string
    {
        return $this->statutRation;
    }

    public function setStatutRation(string $statutRation): static
    {
        $this->statutRation = $statutRation;

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

    public function getPoidsMinRation(): ?float
    {
        return $this->poidsMinRation;
    }

    public function setPoidsMinRation(float $poidsMinRation): static
    {
        $this->poidsMinRation = $poidsMinRation;

        return $this;
    }

    public function getPoidsMaxRation(): ?float
    {
        return $this->poidsMaxRation;
    }

    public function setPoidsMaxRation(float $poidsMaxRation): static
    {
        $this->poidsMaxRation = $poidsMaxRation;

        return $this;
    }

    public function getButeProductionRation(): ?string
    {
        return $this->buteProductionRation;
    }

    public function setButeProductionRation(string $buteProductionRation): static
    {
        $this->buteProductionRation = $buteProductionRation;

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
            $animal->setRation($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getRation() === $this) {
                $animal->setRation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): static
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients->add($ingredient);
            $ingredient->setRation($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): static
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRation() === $this) {
                $ingredient->setRation(null);
            }
        }

        return $this;
    }
}
