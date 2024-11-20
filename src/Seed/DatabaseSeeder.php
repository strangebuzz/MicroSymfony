<?php

declare(strict_types=1);

namespace App\Seed;

use WouterJ\EloquentBundle\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
    }
}
