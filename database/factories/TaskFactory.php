<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Queue\Jobs\FakeJob;

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
            'name' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'description' => fake()->paragraph(),
            'location' => fake()->word(),
            'time_estimate' => fake()->sentence(),
            'completed' => false
        ];
    }
}
