<?php

namespace Database\Factories;

use App\Models\SessionType;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SessionType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
