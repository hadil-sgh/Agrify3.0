<?php

namespace App\Entity;

use App\Repository\TypedeReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: TypedeReclamationRepository::class)]
class TypedeReclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Type name should not be blank")]
    /**
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z]+$/",
     *     message="The type should contain only letters"
     * )
     */
    #[Assert\Length(
        min: 5,
        max: 20,
        minMessage: "description should have at least 5 characters",
        maxMessage: "description should have at most 20 characters"
    )]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 7,
        max: 20,
        minMessage: "description should have at least 7 characters",
        maxMessage: "description should have at most 20 characters"
    )]
    #[assert\NotBlank(message:"description should not be blank")]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
