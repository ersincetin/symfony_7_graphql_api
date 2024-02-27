<?php

namespace App\Service;

use App\Entity\Role;
use App\Entity\User;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;

class QueryService
{
    public function __construct(private UserRepository $userRepository, private RoleRepository $roleRepository)
    {
    }

    public function findUser(int $userId): ?User
    {
        return $this->userRepository->find($userId);
    }

    public function findAllUser(): array
    {
        return $this->userRepository->findAll();
    }

    public function findRole(int $roleId): ?Role
    {
        return $this->roleRepository->find($roleId);
    }

    public function findAllRole(): array
    {
        return $this->roleRepository->findAll();
    }
}