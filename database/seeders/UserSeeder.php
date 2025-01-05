<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'login' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => 'test',
        ]);

        User::factory()->create([
            'name' => 'Test T.S.',
            'login' => 'test',
            'email' => 'test@example.com',
            'is_admin' => false,
            'password' => 'test',
        ]);
    }
}
