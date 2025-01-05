<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
      ['name' => 'Кадри', 'sort'=>'1'],
      ['name' => "Комп'ютери", 'sort'=>'4'],
      ['name' => 'Логісти', 'sort'=>'3'],
      ['name' => 'Юристи', 'sort'=>'5'],
      ['name' => 'Бухгалтерія', 'sort'=>'2'],

      ['name' => 'Довідник співробітників', 'parent_id'=>'1'],
      ['name' => 'Довідник ', 'parent_id'=>'1'],
      ['name' => 'Довідник брендов', 'parent_id'=>'2'],
      ['name' => 'Довідник типов', 'parent_id'=>'2'],
      ['name' => 'Довідник пристроїв', 'parent_id'=>'2'],
      ['name' => 'Пакет', 'parent_id'=>'2'],

    ];

    foreach ($data as $row) {
      Menu::create($row);
    }
    }
}
