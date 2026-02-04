<?php

declare(strict_types=1);

namespace App\Data\Controller;

use App\Controller\ListUsersActionDto;
use App\Repository\UserRepository;
use Doctrine\DBAL\Connection;

final readonly class ListUsersActionData
{
    public function __construct(
        private Connection $conn,
        private UserRepository $userRepository,
    ) {
    }

    public function getData(): ListUsersActionDto
    {
        return new ListUsersActionDto(
            usersDbal: $this->conn->fetchAllAssociative('SELECT * FROM user'),
            usersOrm: $this->userRepository->findAll(),
        );
    }
}
