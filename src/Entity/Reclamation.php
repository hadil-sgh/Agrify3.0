<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /**
     * @ORM\Column(length=255)
     * @Assert\NotBlank(message="Type should not be blank")
     */
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"id should not be blank")]
    #[Assert\Regex(
        pattern: '/^\d+$/',
        message: "l'id doit contenir uniquement des chiffres"
    )]
    #[Assert\Length(
        min: 7,
        max: 20,
        minMessage: "id should have at least 7 numbers",
        maxMessage: "id should have at most 20 numbers"
    )]
    private ?string $rec_emp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    /**
     * @ORM\Column(type="date")
     * @Assert\Type("\DateTimeInterface", message="Date should be a valid date")
     */
    private ?\DateTimeInterface $rec_date = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"description should not be blank")]
    #[Assert\Length(
        min: 7,
        max: 20,
        minMessage: "description should have at least 7 char",
        maxMessage: "description should have at most 20 char"
    )]
    private ?string $rec_description = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"target should not be blank")]
    private ?string $rec_target = null;
    
    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"state should not be blank")]
    private ?string $urgency = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[assert\NotBlank(message:"type should not be blank")]
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
