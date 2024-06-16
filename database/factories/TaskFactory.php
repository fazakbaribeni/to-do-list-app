<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

    protected $model = Task::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence(20),
            'completed' => $this->faker->boolean(),
        ];
    }
}
