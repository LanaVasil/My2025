<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    // --Строрюємо User - користувачів --
    // --варіант 1
    // User::factory(50)->create();

    // --варіант 2
    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    // --/Строрюємо User - користувачів

    // створюємо 15-UnitType и для кожного рандомно від 5 до 10 - Post
    // UnitType::factory(15)
    //   ->has(Unit::factory(rand(5,10)))
    //   ->create();
    // }
    // Unit::factory(50)
    // ->create();
    // }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    $this->call([
      BrandSeeder::class,
      DevTypeSeeder::class,
      DeviceSeeder::class,
      // UnitSeeder::class,
      // PostSeeder::class,
      // StateSeeder::class,
      // WorkerSeeder::class,
      // DocumentSeeder::class,
      // RepairSeeder::class,
      // RepdeviceSeeder::class
    ]);

    }
}
