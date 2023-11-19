<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rec_emp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $rec_date = null;

    #[ORM\Column(length: 255)]
    private ?string $rec_description = null;

    #[ORM\Column(length: 255)]
    private ?string $rec_target = null;
    
    #[ORM\Column(length: 255)]
    private ?string $urgency = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypedeReclamation $type_Rec = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecEmp(): ?string
    {
        return $this->rec_emp;
    }

    public function setRecEmp(string $rec_emp): static
    {
        $this->rec_emp = $rec_emp;

        return $this;
    }

    public function getRecDate(): ?\DateTimeInterface
    {
        return $this->rec_date;
    }

    public function setRecDate(\DateTimeInterface $rec_date): static
    {
        $this->rec_date = $rec_date;

        return $this;
    }

    public function getRecDescription(): ?string
    {
        return $this->rec_description;
    }

    public function setRecDescription(string $rec_description): static
    {
        $this->rec_description = $rec_description;

        return $this;
    }

    public function getRecTarget(): ?string
    {
        return $this->rec_target;
    }

    public function setRecTarget(string $rec_target): static
    {
        $this->rec_target = $rec_target;

        return $this;
    }

    public function getUrgency(): ?string
    {
        return $this->urgency;
    }

    public function setUrgency(string $urgency): static
    {
        $this->urgency = $urgency;

        return $this;
    }

    public function getTypeRec(): ?TypedeReclamation
    {
        return $this->type_Rec;
    }

    public function setTypeRec(?TypedeReclamation $type_Rec): static
    {
        $this->type_Rec = $type_Rec;

        return $this;
    }
}
