<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;

final readonly class ListUsersActionDto
{
    /**
     * @param list<array<string, mixed>> $usersDbal
     * @param list<User>                 $usersOrm
     */
    public function __construct(
        public array $usersDbal,
        public array $usersOrm,
    ) {
    }
}
