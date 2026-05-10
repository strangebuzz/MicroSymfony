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
        $rawSql = 'SELECT * FROM '.$this->conn->quoteSingleIdentifier('user');

        return new ListUsersActionDto(
            usersDbal: $this->conn->fetchAllAssociative($rawSql),
            usersOrm: $this->userRepository->findAll(),
            rawSql: $rawSql,
        );
    }
}
