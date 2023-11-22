<?php

namespace App\Entity;

use App\Repository\GestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GestationRepository::class)]
class Gestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $espece = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $preparationVelage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $velagePrevu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateAvertissement = null;

    #[ORM\OneToOne(mappedBy: 'gestation', cascade: ['persist', 'remove'])]
    private ?Animal $animal = null;

    #[ORM\OneToMany(mappedBy: 'gestation', targetEntity: Newborns::class)]
    private Collection $newBorns;

    public function __construct()
    {
        $this->newBorns = new ArrayCollection();
    }

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

    public function getPreparationVelage(): ?\DateTimeInterface
    {
        return $this->preparationVelage;
    }

    public function setPreparationVelage(\DateTimeInterface $preparationVelage): static
    {
        $this->preparationVelage = $preparationVelage;

        return $this;
    }

    public function getVelagePrevu(): ?\DateTimeInterface
    {
        return $this->velagePrevu;
    }

    public function setVelagePrevu(\DateTimeInterface $velagePrevu): static
    {
        $this->velagePrevu = $velagePrevu;

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

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        // unset the owning side of the relation if necessary
        if ($animal === null && $this->animal !== null) {
            $this->animal->setGestation(null);
        }

        // set the owning side of the relation if necessary
        if ($animal !== null && $animal->getGestation() !== $this) {
            $animal->setGestation($this);
        }

        $this->animal = $animal;

        return $this;
    }

    /**
     * @return Collection<int, NewBorns>
     */
    public function getNewBorns(): Collection
    {
        return $this->newBorns;
    }

    public function addNewBorn(NewBorns $newBorn): static
    {
        if (!$this->newBorns->contains($newBorn)) {
            $this->newBorns->add($newBorn);
            $newBorn->setGestation($this);
        }

        return $this;
    }

    public function removeNewBorn(NewBorns $newBorn): static
    {
        if ($this->newBorns->removeElement($newBorn)) {
            // set the owning side to null (unless already changed)
            if ($newBorn->getGestation() === $this) {
                $newBorn->setGestation(null);
            }
        }

        return $this;
    }
}
