<?php

namespace Database\Seeders;

use app\Models\Bandeira;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BandeiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bandeira::factory(5)->create();
    }
}
