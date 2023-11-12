<?php

namespace App\Entity;

use App\Repository\RationRepository;
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
}
