<?php

declare(strict_types=1);

namespace App\Factory;

use App\Model\User;
use Faker\Factory as FakerFactory;
use Symfony\Component\String\ByteString;
use WouterJ\EloquentBundle\Factory\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();

        return [
            'email' => $faker->unique()->safeEmail(),
            'password' => static::$password ??= password_hash(ByteString::fromRandom(32)->toString(), \PASSWORD_DEFAULT),
            'pseudo' => $faker->name(),
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
