<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\DevType;
// use App\Models\Brand;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Device::factory(100)->create();
  }
}

// HP 125A
// PN-125AYR (CB542A) жовтий
// HP 59X (CF259X)
// HP 59A (CF259X)