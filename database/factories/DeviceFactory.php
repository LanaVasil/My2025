<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\DevType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => ucfirst($this->faker->unique()->words(2, true)),
          'note' => ucfirst($this->faker->words(1, true)),
          // 'status' => $this->faker->boolean(),
          // 'status' => $this->faker->inRandomOrder(),
          'status' => $this->faker->randomElement(['0', '1', '9']),
          'brand_id' => Brand::query()->inRandomOrder()->value('id'),
          'dev_type_id' => DevType::query()->inRandomOrder()->value('id'),
        ];
    }
}
