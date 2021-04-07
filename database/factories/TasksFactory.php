<?php

namespace Database\Factories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tasks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'head' => $this->faker->jobTitle,
            'descn' => $this->faker->text(550), 
            'price' => $this->faker->numberBetween(100, 100000),
            'customer' => '1',
            'executor' => '1',
            'category' => '1',
            'status' => 'new',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ];
    }
}
