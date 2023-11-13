<?php

namespace App\Entity;

use App\Repository\NutritionnelNeedsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionnelNeedsRepository::class)]
class NutritionalNeeds
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $especeBesoinNutritionnel = null;

    #[ORM\Column(length: 255)]
    private ?string $statutProductionBesoinNutritionnel = null;

    #[ORM\Column(length: 255)]
    private ?string $sexeBesoinNutritionnel = null;

    #[ORM\Column]
    private ?float $poidsMinBesoinNutritionnel = null;

    #[ORM\Column]
    private ?float $poidsMaxBesoinNutritionnel = null;

    #[ORM\Column(length: 255)]
    private ?string $buteProductionBesoinNutritionnel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspeceBesoinNutritionnel(): ?string
    {
        return $this->especeBesoinNutritionnel;
    }

    public function setEspeceBesoinNutritionnel(string $especeBesoinNutritionnel): static
    {
        $this->especeBesoinNutritionnel = $especeBesoinNutritionnel;

        return $this;
    }

    public function getStatutProductionBesoinNutritionnel(): ?string
    {
        return $this->statutProductionBesoinNutritionnel;
    }

    public function setStatutProductionBesoinNutritionnel(string $statutProductionBesoinNutritionnel): static
    {
        $this->statutProductionBesoinNutritionnel = $statutProductionBesoinNutritionnel;

        return $this;
    }

    public function getSexeBesoinNutritionnel(): ?string
    {
        return $this->sexeBesoinNutritionnel;
    }

    public function setSexeBesoinNutritionnel(string $sexeBesoinNutritionnel): static
    {
        $this->sexeBesoinNutritionnel = $sexeBesoinNutritionnel;

        return $this;
    }

    public function getPoidsMinBesoinNutritionnel(): ?float
    {
        return $this->poidsMinBesoinNutritionnel;
    }

    public function setPoidsMinBesoinNutritionnel(float $poidsMinBesoinNutritionnel): static
    {
        $this->poidsMinBesoinNutritionnel = $poidsMinBesoinNutritionnel;

        return $this;
    }

    public function getPoidsMaxBesoinNutritionnel(): ?float
    {
        return $this->poidsMaxBesoinNutritionnel;
    }

    public function setPoidsMaxBesoinNutritionnel(float $poidsMaxBesoinNutritionnel): static
    {
        $this->poidsMaxBesoinNutritionnel = $poidsMaxBesoinNutritionnel;

        return $this;
    }

    public function getButeProductionBesoinNutritionnel(): ?string
    {
        return $this->buteProductionBesoinNutritionnel;
    }

    public function setButeProductionBesoinNutritionnel(string $buteProductionBesoinNutritionnel): static
    {
        $this->buteProductionBesoinNutritionnel = $buteProductionBesoinNutritionnel;

        return $this;
    }
}
