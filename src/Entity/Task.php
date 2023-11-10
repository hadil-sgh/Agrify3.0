<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


enum TaskStatus: string
{
    case OPEN = 'Open';
    case IN_PROGRESS = 'In progress';
    case COMPLETED = 'Completed';
    case IN_REVIEW = 'In review';
    case CANCELED = 'Canceled';

}

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ApiResource]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $taskTitle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\Column(length: 255)]
    private ?TaskStatus $status = null;
    
    #[ORM\ManyToOne(targetEntity:User::class, inversedBy:"tasks")]
    private ?User $assignedChef;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskTitle(): ?string
    {
        return $this->taskTitle;
    }

    public function setTaskTitle(string $taskTitle): static
    {
        $this->taskTitle = $taskTitle;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTimeInterface $deadline): static
    {
        $this->deadline = $deadline;

        return $this;
    }
    
    public function getAssignedChef(): ?User
    {
        return $this->assignedChef;
    }

    public function setAssignedChef(?User $assignedChef): static
    {
        $this->assignedChef = $assignedChef;
        return $this;
    }

    public function getStatus(): ?TaskStatus
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        // Allow null values
        if ($status === null) {
            $this->status = null;
            return $this;
        }

        // If the provided value is a string, convert it to TaskStatus enum
        if (is_string($status)) {
            $status = TaskStatus::from($status);
        }

        // Check if $status is an instance of TaskStatus enum
        if (!$status instanceof TaskStatus) {
            throw new \InvalidArgumentException('Invalid status value.');
        }

        $this->status = $status;

        return $this;
    }
}
