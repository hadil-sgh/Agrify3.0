<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MaterielRepository::class)]
#[ApiResource]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[assert\NotBlank(message:"Spécifiez le type du matériel!")]
    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    #[assert\NotBlank(message:"Spécifiez l'état' du matériel!")]
    #[Assert\Length(
        min : 5,
        max : 50,
        minMessage : "Le champ doit contenir au moins 5 caractères.",
        maxMessage : "Le champ ne peut pas contenir plus de 50 caractères."
    )]
    private ?string $etat = null;

    #[ORM\Column(length: 100)]
    #[assert\NotBlank(message:"Spécifiez la capacité du matériel!")]
    #[Assert\Type(type:"numeric", message:"La Capacité doit être un nombre.")]
    #[Assert\GreaterThan(value:"0", message:"La capacité doit être supérieure à zéro.")]
    private ?int $capacite_masse = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[assert\NotBlank(message:"Spécifiez la capacité du matériel!")]
    #[Assert\Type(type:"numeric", message:"La Capacité doit être un nombre.")]
    #[Assert\GreaterThan(value:"0", message:"La capacité doit être supérieure à zéro.")]
    private ?int $capacite_volume = null;

    #[ORM\Column]
    #[assert\NotBlank(message:"Spécifiez le prix du matériel!")]
    #[Assert\Type(type:"numeric", message:"Le prix doit être un nombre.")]
    #[Assert\GreaterThan(value:"0", message:"Le prix doit être supérieure à zéro.")]
    private ?int $prix = null;

    #[ORM\OneToMany(mappedBy: 'type_materiel', targetEntity: Maintenance::class)]
    private Collection $maintenance;

    public function __construct()
    {
        $this->maintenance = new ArrayCollection();
    }

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCapaciteMasse(): ?int
    {
        return $this->capacite_masse;
    }

    public function setCapaciteMasse(int $capacite_masse): static
    {
        $this->capacite_masse = $capacite_masse;

        return $this;
    }

    public function getCapaciteVolume(): ?int
    {
        return $this->capacite_volume;
    }

    public function setCapaciteVolume(?int $capacite_volume): static
    {
        $this->capacite_volume = $capacite_volume;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Maintenance>
     */
    public function getMaintenance(): Collection
    {
        return $this->maintenance;
    }

    public function addMaintenance(Maintenance $maintenance): static
    {
        if (!$this->maintenance->contains($maintenance)) {
            $this->maintenance->add($maintenance);
            $maintenance->setTypeMateriel($this);
        }

        return $this;
    }

    public function removeMaintenance(Maintenance $maintenance): static
    {
        if ($this->maintenance->removeElement($maintenance)) {
            // set the owning side to null (unless already changed)
            if ($maintenance->getTypeMateriel() === $this) {
                $maintenance->setTypeMateriel(null);
            }
        }

        return $this;
    }
}
