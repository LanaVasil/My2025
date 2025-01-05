<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
      ['name' => 'Департаменти','sort'=> '1'],
      ['name' => 'відділи','sort'=> '9'],
    ];

    foreach ($data as $row) {
      UnitType::create($row);
    }
    }
}
