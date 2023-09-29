<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,1000),
            'status_id' => $this->faker->numberBetween(1,4),
            'title' => $this->faker->text(),
            'description' => $this->faker->text(),
            'published_at'=> $this->faker->dateTimeBetween('now', 'now'),
            'created_at'=> $this->faker->dateTimeBetween('now', 'now'),
            'updated_at'=> $this->faker->dateTimeBetween('now', 'now'),
        ];
    }
}
