<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ScheduledMovie;
use App\Models\Movie;
use App\Models\Auditorium;

class ScheduledMovieFactory extends Factory
{

    protected $model = ScheduledMovie::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeThisYear();
        return [
            'movie_id'=>Movie::factory(),
            'start'=>$startDate,
            'end'=>$this->faker->dateTimeBetween($startDate),
            'auditorium_id'=>Auditorium::factory(),
            'price'=>$this->faker->numberBetween(2000,3000)
        ];
    }
}
