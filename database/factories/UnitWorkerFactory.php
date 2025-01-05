<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class UnitWorkerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'cellphone' => '+38095' .$this->faker->unique()->numberBetween(1111111,9999999),
            'phone' => $this->faker->numberBetween(1111,9999),
            'email' => $this->faker->email(),
            'unit_id' => Unit::query()->inRandomOrder()->value('id'),
            // 'status' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(['0', '1']),
          ];
    }
}
