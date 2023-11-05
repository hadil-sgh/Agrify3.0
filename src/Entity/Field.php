<?php

namespace App\Entity;

use App\Repository\FieldRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FieldRepository::class)]
class Field
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $field_id = null;

    #[ORM\Column(length: 255)]
    private ?string $field_Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $field_chef = null;

    #[ORM\Column(length: 255)]
    private ?string $field_type = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $field_Superficie = null;

    #[ORM\Column]
    private ?int $field_quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFieldId(): ?int
    {
        return $this->field_id;
    }

    public function setFieldId(int $field_id): static
    {
        $this->field_id = $field_id;

        return $this;
    }

    public function getFieldNom(): ?string
    {
        return $this->field_Nom;
    }

    public function setFieldNom(string $field_Nom): static
    {
        $this->field_Nom = $field_Nom;

        return $this;
    }

    public function getFieldChef(): ?string
    {
        return $this->field_chef;
    }

    public function setFieldChef(string $field_chef): static
    {
        $this->field_chef = $field_chef;

        return $this;
    }

    public function getFieldType(): ?string
    {
        return $this->field_type;
    }

    public function setFieldType(string $field_type): static
    {
        $this->field_type = $field_type;

        return $this;
    }

    public function getFieldSuperficie(): ?string
    {
        return $this->field_Superficie;
    }

    public function setFieldSuperficie(string $field_Superficie): static
    {
        $this->field_Superficie = $field_Superficie;

        return $this;
    }

    public function getFieldQuantity(): ?int
    {
        return $this->field_quantity;
    }

    public function setFieldQuantity(int $field_quantity): static
    {
        $this->field_quantity = $field_quantity;

        return $this;
    }
}
