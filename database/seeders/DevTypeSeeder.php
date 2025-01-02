<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DevType;

class DevTypeSeeder extends Seeder
{

  public function run(): void
  {
  // видалення усіх записів з БД
    // Brand::truncate();
    // Brand::factory(20)->create();

    $data = [
      ['name' => 'картридж', 'sort' => '1'],
      ['name' => 'фотобарабан', 'sort' => '3'],
      ['name' => 'туба з тонером', 'sort' => '5'],
      ['name' => 'принтер', 'sort' => '20'],
      ['name' => 'монітор', 'sort' => '30'],
      ['name' => 'системной блок', 'sort' => '40'],
      ['name' => 'ноутбук', 'sort' => '42'],
      ['name' => 'моноблок', 'sort' => '44'],
      ['name' => 'ББЖ', 'sort' => '50'],
      ['name' => 'зарядні станції', 'sort' => '60'],
      ['name' => 'шредер', 'sort' => '70'],
      ['name' => 'інше', 'sort' => '100'],
    ];

    foreach ($data as $row) {
      DevType::create($row);
    }

  }
}
