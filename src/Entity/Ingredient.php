<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameIngredient = null;

    #[ORM\Column]
    private ?float $itemQuantityIngredient = null;

    #[ORM\Column(length: 255)]
    private ?string $unitIngredient = null;

    #[ORM\Column]
    private ?float $costIngredient = null;

    #[ORM\Column(length: 255)]
    private ?string $loadedByIngredient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionIngredient = null;

    #[ORM\Column(length: 255)]
    private ?string $typeIngredient = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $nutrimentPrincipalIngredient = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameIngredient(): ?string
    {
        return $this->nameIngredient;
    }

    public function setNameIngredient(string $nameIngredient): static
    {
        $this->nameIngredient = $nameIngredient;

        return $this;
    }

    public function getItemQuantityIngredient(): ?float
    {
        return $this->itemQuantityIngredient;
    }

    public function setItemQuantityIngredient(float $itemQuantityIngredient): static
    {
        $this->itemQuantityIngredient = $itemQuantityIngredient;

        return $this;
    }

    public function getUnitIngredient(): ?string
    {
        return $this->unitIngredient;
    }

    public function setUnitIngredient(string $unitIngredient): static
    {
        $this->unitIngredient = $unitIngredient;

        return $this;
    }

    public function getCostIngredient(): ?float
    {
        return $this->costIngredient;
    }

    public function setCostIngredient(float $costIngredient): static
    {
        $this->costIngredient = $costIngredient;

        return $this;
    }

    public function getLoadedByIngredient(): ?string
    {
        return $this->loadedByIngredient;
    }

    public function setLoadedByIngredient(string $loadedByIngredient): static
    {
        $this->loadedByIngredient = $loadedByIngredient;

        return $this;
    }

    public function getDescriptionIngredient(): ?string
    {
        return $this->descriptionIngredient;
    }

    public function setDescriptionIngredient(?string $descriptionIngredient): static
    {
        $this->descriptionIngredient = $descriptionIngredient;

        return $this;
    }

    public function getTypeIngredient(): ?string
    {
        return $this->typeIngredient;
    }

    public function setTypeIngredient(string $typeIngredient): static
    {
        $this->typeIngredient = $typeIngredient;

        return $this;
    }

    public function getNutrimentPrincipalIngredient(): array
    {
        return $this->nutrimentPrincipalIngredient;
    }

    public function setNutrimentPrincipalIngredient(array $nutrimentPrincipalIngredient): static
    {
        $this->nutrimentPrincipalIngredient = $nutrimentPrincipalIngredient;

        return $this;
    }
}
