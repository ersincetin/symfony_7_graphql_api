<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id')]
    private int $id;
    #[ORM\Column(name: 'status', type: Types::BOOLEAN, length: 1)]
    private ?bool $status = false;
    #[ORM\Column(name: 'role_id', type: Types::INTEGER)]
    private int $role_id;
    #[ORM\Column(name: 'sex', type: Types::STRING, length: 1)]
    private ?string $sex = null;
    #[ORM\Column(name: 'username', type: Types::STRING, length: 32)]
    private string $username;
    #[ORM\Column(name: 'firstname', type: Types::STRING, length: 32)]
    private string $firstname;
    #[ORM\Column(name: 'second_name', type: Types::STRING, length: 32)]
    private ?string $second_name = null;
    #[ORM\Column(name: 'lastname', type: Types::STRING, length: 64)]
    private string $lastname;
    #[ORM\Column(name: 'email', type: Types::STRING, length: 128)]
    private string $email;
    #[ORM\Column(name: 'password', type: Types::STRING, length: 256)]
    private string $password;
    #[ORM\Column(name: 'photo_url', type: Types::STRING, length: 32)]
    private ?string $photo_url = null;
    #[ORM\Column(name: 'password_reset_uniq_id', type: Types::STRING, length: 13)]
    private ?string $password_reset_uniq_id = null;
    #[ORM\Column(name: 'last_login_at', type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $last_login_at = null;
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    private \DateTime $created_at;
    #[ORM\Column(name: 'updated_at', type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $updated_at = null;
    #[ORM\Column(name: 'deleted_at', type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $deleted_at = null;

    #[ORM\OneToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(nullable: true)]
    private Role $role;

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }

    public function getRoleId(): int
    {
        return $this->role_id;
    }

    public function setRoleId(int $role_id): void
    {
        $this->role_id = $role_id;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): void
    {
        $this->sex = $sex;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    public function setSecondName(?string $second_name): void
    {
        $this->second_name = $second_name;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(?string $photo_url): void
    {
        $this->photo_url = $photo_url;
    }

    public function getPasswordResetUniqId(): ?string
    {
        return $this->password_reset_uniq_id;
    }

    public function setPasswordResetUniqId(?string $password_reset_uniq_id): void
    {
        $this->password_reset_uniq_id = $password_reset_uniq_id;
    }

    public function getLastLoginAt(): ?\DateTime
    {
        return $this->last_login_at;
    }

    public function setLastLoginAt(?\DateTime $last_login_at): void
    {
        $this->last_login_at = $last_login_at;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTime $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }
}
