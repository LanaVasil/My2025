<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\UnitType;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
    UnitType::factory(15)
      ->has(Unit::factory(rand(5,10)))
      ->create(); 
    }
    // Unit::factory(50)
    // ->create(); 
    // }
}
