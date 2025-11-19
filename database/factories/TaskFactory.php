<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $statuses = ['pending', 'in_progress', 'completed'];

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            // Status task dipilih acak dari tiga status yang valid
            'status' => $this->faker->randomElement($statuses), 
            // Due date di masa depan
            'due_date' => $this->faker->dateTimeBetween('tomorrow', '+1 month'), 
            // Kolom 'user_id' akan diisi secara spesifik di seeder
        ];
    }
}