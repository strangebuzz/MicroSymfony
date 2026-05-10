<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\User;
// use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<User>
 *
 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories
 */
final class UserFactory extends PersistentObjectFactory
{
    #[\Override]
    public static function class(): string
    {
        return User::class;
    }

    /**
     * @return array<string, mixed>
     */
    #[\Override]
    protected function defaults(): array
    {
        return [
            'email' => self::faker()->email(),
            'username' => self::faker()->userName(),
            // @todo If you enable the security layer, the password must be hashed.
            // @see https://symfony.com/doc/current/security/passwords.html
            'password' => self::faker()->password(),
        ];
    }
}
