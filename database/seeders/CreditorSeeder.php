<?php

namespace Database\Seeders;

use App\Models\Creditor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Creditor::factory()
            ->count(50)
            ->create();
    }
}
