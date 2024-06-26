<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hr' => fake()->numberBetween(30, 220),
            'steps' => fake()->randomNumber(),
            'workout_time' => fake()->randomNumber(),  
            'bp' => fake()->numberBetween(90, 120),
            'energy_burn' => fake()->randomNumber(),
            'activity_level' => fake()->randomNumber(),
            'user_id' => fake()->unique()->numberBetween(1, 10)
        ];
    }
}
