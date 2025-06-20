<?php

namespace Database\Factories;

use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
    protected $model = Goal::class;

    public function definition(): array
    {
        // Random status and boolean completed
        $status = $this->faker->randomElement(['not started', 'in progress', 'completed']);
        $completed = $status === 'completed';

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'due_date' => $this->faker->dateTimeBetween('-12 months', '+2 months'),
            'status' => $status,
            'completed' => $completed,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
