<?php

namespace App\Entity;

use App\Repository\AnimauxEnGestationEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimauxEnGestationEntityRepository::class)]
class AnimauxEnGestationEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $espece = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $preparationVêlage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $vêlagePrévu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateAvertissement = null;

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

    public function getPreparationVêlage(): ?\DateTimeInterface
    {
        return $this->preparationVêlage;
    }

    public function setPreparationVêlage(\DateTimeInterface $preparationVêlage): static
    {
        $this->preparationVêlage = $preparationVêlage;

        return $this;
    }

    public function getVêlagePrévu(): ?\DateTimeInterface
    {
        return $this->vêlagePrévu;
    }

    public function setVêlagePrévu(\DateTimeInterface $vêlagePrévu): static
    {
        $this->vêlagePrévu = $vêlagePrévu;

        return $this;
    }

    public function getDateAvertissement(): ?\DateTimeInterface
    {
        return $this->dateAvertissement;
    }

    public function setDateAvertissement(\DateTimeInterface $dateAvertissement): static
    {
        $this->dateAvertissement = $dateAvertissement;

        return $this;
    }
}
