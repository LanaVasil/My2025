<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Repair;
use App\Models\Device;
use App\Models\Worker;
use App\Models\RepairLetters;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repdevice>
 */
class RepairDeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'repair_id' => Repair::query()->inRandomOrder()->value('id'),
          'device_id' => Device::query()->inRandomOrder()->value('id'),
          'worker_id' => Worker::query()->inRandomOrder()->value('id'),
          'repair_letter_id' => RepairLetters::query()->inRandomOrder()->value('id'),
          'note' => ucfirst($this->faker->words(6, true)),
          'serial' => $this->faker->regexify('[A-Z]{2}[0-9]{7}'),
          'inventory' => $this->faker->numberBetween($min = 100000000000, $max = 999999999999),
        ];
    }
}
