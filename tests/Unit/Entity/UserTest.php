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

        self::assertNull($user->getId());
        self::assertTrue($user->isNew());
        $normalizedEmail = 'test@example.com';
        self::assertSame($normalizedEmail, $user->setEmail('test@example.com')->getEmail());
        self::assertSame($normalizedEmail, $user->setEmail('Test@Example.CoM  ')->getEmail());
        self::assertSame($normalizedEmail, $user->setEmail('   Test@Example.CoM')->getEmail());
        self::assertSame($normalizedEmail, $user->setEmail('Test@example.CoM')->getEmail());
        self::assertSame('COil', $user->setUsername('COil')->getUsername());
        self::assertSame('COil', $user->getUserIdentifier());
        self::assertSame('123456', $user->setPassword('123456')->getPassword());
        self::assertSame('COil (not persisted)', (string) $user);
        self::assertSame(['ROLE_USER'], $user->getRoles());
        $user->eraseCredentials();
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
        $user = new User('email', 'password', 'serialized');
        $serializedUser = 'O:15:"App\Entity\User":4:{i:0;N;i:1;s:10:"serialized";i:2;s:8:"password";i:3;s:5:"email";}';
        self::assertSame($serializedUser, serialize($user));
        unserialize($serializedUser);
    }
}
