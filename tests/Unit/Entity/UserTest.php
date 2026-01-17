<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\User;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(User::class)]
final class UserTest extends TestCase
{
    public function testUserEntity(): void
    {
        $user = new User('', '', '');
        $roles = ['ROLE_USER'];

        self::assertSame(1, $user->setId(1)->getId());
        self::assertSame('test@example.com', $user->setEmail('test@example.com')->getEmail());
        self::assertSame('COil', $user->setUsername('COil')->getUsername());
        self::assertSame('COil', $user->getUserIdentifier());
        self::assertSame('123456', $user->setPassword('123456')->getPassword());
        self::assertSame('COil (1)', (string) $user);
        self::assertSame($roles, $user->getRoles());
    }

    public function testUserGetUserIdentifier(): void
    {
        $user = new User('email', 'password', 'username');
        $user->setUsername('');
        $this->expectException(\LogicException::class);
        $user->getUserIdentifier();
    }

    public function testUserSerialize(): void
    {
        $user = new User('email', 'password', 'serialized')->setId(1);
        $serializedUser = 'O:15:"App\Entity\User":4:{i:0;i:1;i:1;s:10:"serialized";i:2;s:8:"password";i:3;s:5:"email";}';
        self::assertSame($serializedUser, serialize($user));
        unserialize($serializedUser);
    }
}
