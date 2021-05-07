<?php

namespace Database\Factories;

use App\Models\Recycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recycle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->numberBetween(6, 22);



        $weekDayNumber = $this->faker->numberBetween(1, 7);


        return [
            'weekDay' => $weekDayNumber,
            'startTime' => $start,
            'endTime' => $start + 2,
            'type' => $this->faker->name()
        ];
    }
}
