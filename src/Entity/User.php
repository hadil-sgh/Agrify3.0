<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity('username', message: 'This username is already taken.')]

class User implements UserInterface,PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $user_id;
    

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $user_nom = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $user_prenom = null;

    #[Assert\Email(message: 'The email {{ value }} is not a valid email.',)]
    #[ORM\Column(length: 255)]
    private ?string $user_email = null;

    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^\d{8,}$/',message: 'The telephone number must be at least 8 digits.' )]
    #[ORM\Column(length: 255)]
    private ?string $user_telephone = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $user_role = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $user_genre = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?int $user_nbrabscence = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255, unique: true)] // unique constraint on username
     private ?string $username = null;



    #[Assert\NotBlank]
    #[Assert\Length(min: 8,minMessage: 'Your password must be at least {{ limit }} characters long.')]
    #[ORM\Column(length: 255)]
    private ?string $password = null;


    public function getUserId(): ?int
    {
        return $this->user_id;
    }
    

    public function getUserNom(): ?string
    {
        return $this->user_nom;
    }

    public function setUserNom(string $user_nom): static
    {
        $this->user_nom = $user_nom;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->user_prenom;
    }

    public function setUserPrenom(string $user_prenom): static
    {
        $this->user_prenom = $user_prenom;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): static
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserTelephone(): ?string
    {
        return $this->user_telephone;
    }

    public function setUserTelephone(string $user_telephone): static
    {
        $this->user_telephone = $user_telephone;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->user_role;
    }

    public function setUserRole(string $user_role): static
    {
        $this->user_role = $user_role;

        return $this;
    }

    public function getSalt()
    {
    }

    public function getUserGenre(): ?string
    {
        return $this->user_genre;
    }

    public function setUserGenre(string $user_genre): static
    {
        $this->user_genre = $user_genre;

        return $this;
    }

    public function getUserNbrabscence(): ?int
    {
        return $this->user_nbrabscence;
    }

    public function setUserNbrabscence(int $user_nbrabscence): static
    {
        $this->user_nbrabscence = $user_nbrabscence;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

        /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = [$this->user_role];
    
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
    
        // Check if the user role is 'Admin' and add 'ROLE_Admin' accordingly
        if ($this->user_role === 'Admin') {
            $roles[] = 'ROLE_ADMIN';
        }
    
        return array_unique($roles);
    }




    
    /*
    public function getRoles(): array
{
    $roles = ['ROLE_' . $this->user_role];

    // guarantee every user at least has ROLE_USER
    $roles[] = 'ROLE_USER';

    // Check if the user role is 'Admin' and add 'ROLE_ADMIN' accordingly
    if ($this->user_role === 'Admin') {
        $roles[] = 'ROLE_ADMIN';
    }

    return array_unique($roles);
}

    */


}
