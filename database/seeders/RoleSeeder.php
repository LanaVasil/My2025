<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
      ['id'=>'1', 'name' => 'user'],
      ['id'=>'2', 'name' => 'boss'],
      ['id'=>'3', 'name' => 'author'],
      ['id'=>'4', 'name' => 'editor'],
      ['id'=>'5', 'name' => 'pro'],
      ['id'=>'8', 'name' => 'admin'],
    ];

    foreach ($data as $row) {
      Role::create($row);
    }
    }
}
