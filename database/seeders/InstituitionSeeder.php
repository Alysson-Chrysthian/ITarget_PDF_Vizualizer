<?php

namespace Database\Seeders;

use App\Models\Instituition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instituition::factory()
            ->count(50)
            ->create();
    }
}
