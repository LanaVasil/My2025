<?php

namespace Database\Seeders;

use App\Models\UnitWorker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    UnitWorker::factory(100)->create();
    }
}
