<?php

namespace App\Service;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class MutationService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createUser(array $userInfo): User
    {
        $user = new User(
            $userInfo['status'],
            $userInfo['sex'],
            $userInfo['roleId'],
            $userInfo['username'],
            $userInfo['firstname'],
            $userInfo['secondName'],
            $userInfo['lastname'],
            $userInfo['email'],
            $userInfo['photoUrl'],
            \DateTime::createFromFormat('d/m/Y', $userInfo['createdAt'])
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

    public function updateUser(int $userId, array $userInfo): User
    {
        $user = $this->entityManager->getRepository(User::class)->find($userId);

        if (is_null($user))
            throw new \Error('Could not find user');

        foreach ($userInfo as $key => $value) {
            $user->$key = $value;
        }

        $this->entityManager->flush();
        return $user;
    }

    public function deleteUser(int $userId): int
    {
        $user = $this->entityManager->getRepository(User::class)->find($userId);

        if (is_null($user))
            throw new \Error('Could not find user for delete');

        $user->setDeletedAt(new \DateTime());
        $this->entityManager->flush();

        return 1;
    }

    public function createRole(array $roleInfo): Role
    {
        $role = new Role();
        $role->setStatus($roleInfo['status']);
        $role->setName($roleInfo['name']);
        $role->setPermissions($roleInfo['permissions']);

        $this->entityManager->persist($role);
        $this->entityManager->flush();
        return $role;
    }

    public function updateRole(int $roleId, array $roleInfo): Role
    {
        $role = $this->entityManager->getRepository(Role::class)->find($roleId);

        if (is_null($role))
            throw new \Error('Could not find user');

        foreach ($roleInfo as $key => $value) {
            $role->$key = $value;
        }

        $this->entityManager->flush();
        return $role;
    }

    public function deleteRole(int $roleId): int
    {
        $role = $this->entityManager->getRepository(User::class)->find($roleId);

        if (is_null($role))
            throw new \Error('Could not find user for delete');

        $role->setDeletedAt(new \DateTime());
        $this->entityManager->flush();

        return 1;
    }
}