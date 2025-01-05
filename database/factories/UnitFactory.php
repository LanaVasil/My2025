<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UnitType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{

    // protected $model = Unit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name_full' => ucfirst($this->faker->words(3, true)),
          'name' => $this->faker->unique()->company,
          'status' => $this->faker->randomElement(['0', '1']),
          'unit_type_id'=>UnitType::query()->inRandomOrder()->value('id'),
        ];
    }
}
