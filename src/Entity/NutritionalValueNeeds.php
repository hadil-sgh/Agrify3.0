<?php

namespace App\Entity;

use App\Repository\NutritionalValueNeedsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionalValueNeedsRepository::class)]
class NutritionalValueNeeds
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $pb = null;

    #[ORM\Column]
    private ?float $fb = null;

    #[ORM\Column]
    private ?float $adf = null;

    #[ORM\Column]
    private ?float $ndf = null;

    #[ORM\Column]
    private ?float $ms = null;

    #[ORM\Column]
    private ?float $eb = null;

    #[ORM\Column]
    private ?float $ca = null;

    #[ORM\Column]
    private ?float $p = null;

    #[ORM\Column]
    private ?float $mg = null;

    #[ORM\Column]
    private ?float $k = null;

    #[ORM\OneToOne(inversedBy: 'nutritionalValueNeeds', cascade: ['persist', 'remove'])]
    private ?NutritionalNeeds $nutritionalNeeds = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPb(): ?float
    {
        return $this->pb;
    }

    public function setPb(float $pb): static
    {
        $this->pb = $pb;

        return $this;
    }

    public function getFb(): ?float
    {
        return $this->fb;
    }

    public function setFb(float $fb): static
    {
        $this->fb = $fb;

        return $this;
    }

    public function getAdf(): ?float
    {
        return $this->adf;
    }

    public function setAdf(float $adf): static
    {
        $this->adf = $adf;

        return $this;
    }

    public function getNdf(): ?float
    {
        return $this->ndf;
    }

    public function setNdf(float $ndf): static
    {
        $this->ndf = $ndf;

        return $this;
    }

    public function getMs(): ?float
    {
        return $this->ms;
    }

    public function setMs(float $ms): static
    {
        $this->ms = $ms;

        return $this;
    }

    public function getEb(): ?float
    {
        return $this->eb;
    }

    public function setEb(float $eb): static
    {
        $this->eb = $eb;

        return $this;
    }

    public function getCa(): ?float
    {
        return $this->ca;
    }

    public function setCa(float $ca): static
    {
        $this->ca = $ca;

        return $this;
    }

    public function getP(): ?float
    {
        return $this->p;
    }

    public function setP(float $p): static
    {
        $this->p = $p;

        return $this;
    }

    public function getMg(): ?float
    {
        return $this->mg;
    }

    public function setMg(float $mg): static
    {
        $this->mg = $mg;

        return $this;
    }

    public function getK(): ?float
    {
        return $this->k;
    }

    public function setK(float $k): static
    {
        $this->k = $k;

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
}
