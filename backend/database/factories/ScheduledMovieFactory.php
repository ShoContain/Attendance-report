<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ScheduledMovie;
use App\Models\Movie;
use App\Models\Auditorium;
use Carbon\Carbon;

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
        $movie = Movie::inRandomOrder()->first();
        $startDate = Carbon::createFromTimestamp($this->faker->dateTimeThisMonth()->getTimestamp());
        $endDate = $startDate->copy()->addMinutes($movie->minutes);
        return [
            'movie_id'=>$movie->id,
            'start'=>$startDate,
            'end'=>$endDate,
            'auditorium_id'=>Auditorium::inRandomOrder()->first()->id,
            'price'=>$this->faker->numberBetween(2000,3000)
        ];
    }
}
