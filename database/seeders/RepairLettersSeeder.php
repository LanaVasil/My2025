<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RepairLetters; 
use App\Models\Unit; 

class RepairLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      RepairLetters::factory(20)
        ->has(Unit::factory(rand(1, 3)))
        ->create();  
    }
}
