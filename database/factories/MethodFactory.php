<?php

namespace Database\Factories;

use App\Models\Method;
use Illuminate\Database\Eloquent\Factories\Factory;

class MethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Method::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
            'info' => $this->faker->paragraph($nbSentences = rand(2, 6), $variableNbSentences = true),
            'intensity' => rand(1,5),
            'duration' => rand(20, 180),
            'charge' => rand(1,10),
            'is_private' => $this->faker->boolean(60)
        ];
    }
}
