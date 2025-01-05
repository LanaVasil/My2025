<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_full' => ucfirst($this->faker->words(4, true)),
            'name' => ucfirst($this->faker->words(2, true)),
            'post_id' => Post::query()->inRandomOrder()->value('id'),
            'unit_id' => Unit::query()->inRandomOrder()->value('id'),
            'quantity' => $this->faker->numberBetween(4,5,10),
            'start_at' => '2024-01-04',
            // 'start_at' => $this->faker->dateTime()->format('Y-m-d'),
            'status' => $this->faker->numberBetween(0, 1),
            'sort' => $this->faker->numberBetween(1, 99)
        ];
    }
}
