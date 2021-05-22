<?php

namespace Database\Factories;

use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = (Carbon::today()->subDay(rand(0, 10)))->format('Y-m-d');
        $end = (Carbon::today()->addDay(rand(0, 10)))->format('Y-m-d');
        return [
            'microcycle_id' => rand(1, 10),
            'session_type_id' => 2,
            'name' => $this->faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
            'info' => $this->faker->paragraph($nbSentences = rand(2, 6), $variableNbSentences = true),
            'start_session' => $start,
            'end_session' => $end,

        ];
    }
}
