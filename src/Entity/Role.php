<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
#[ORM\Table(name: 'roles')]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id')]
    private int $id;
    #[ORM\Column(name: 'status', type: Types::BOOLEAN, length: 1)]
    private ?bool $status = false;
    #[ORM\Column(name: 'is_admin', type: Types::SMALLINT, length: 1)]
    private ?int $is_admin = null;
    #[ORM\Column(name: 'name', type: Types::STRING, length: 32)]
    private string $name;
    #[ORM\Column(name: 'permissions', type: Types::TEXT)]
    private ?string $permissions = null;
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    private \DateTime $created_at;
    #[ORM\Column(name: 'updated_at', type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $updated_at = null;
    #[ORM\Column(name: 'deleted_at', type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $deleted_at = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function getIsAdmin(): ?int
    {
        return $this->is_admin;
    }

    public function setIsAdmin(?int $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPermissions(): ?string
    {
        return $this->permissions;
    }

    public function setPermissions(?string $permissions): void
    {
        $this->permissions = $permissions;
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
}
