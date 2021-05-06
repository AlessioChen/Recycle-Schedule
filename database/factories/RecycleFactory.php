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

        // $weekDays = [
        //     1 => 'Monday',
        //     2 => 'Tuesday',
        //     3 => 'Wednesday',
        //     4 => 'Thursday',
        //     5 => 'Friday',
        //     6 => 'Saturday',
        //     7 => 'Sunday',
        // ];

        $weekDayNumber = $this->faker->numberBetween(1, 7);


        return [
            'week_day' => $weekDayNumber,
            'startTime' => $start,
            'endTime' => $start + 2,
            'type' => $this->faker->name()
        ];
    }
}
