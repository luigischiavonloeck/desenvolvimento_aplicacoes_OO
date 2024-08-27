<?php

namespace Database\Seeders;

use app\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            BandeiraSeeder::class,
            PostoSeeder::class
        ]);

    }
}
