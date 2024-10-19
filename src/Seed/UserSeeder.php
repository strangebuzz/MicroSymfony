<?php

declare(strict_types=1);

namespace App\Seed;

use App\Factory\UserFactory;
use WouterJ\EloquentBundle\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->count(10)->create();
    }
}
