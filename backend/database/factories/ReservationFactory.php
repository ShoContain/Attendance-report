<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Models\Seat;
use \App\Models\Movie;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seat_id'=>Seat::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id,
            'movie_id'=>Movie::inRandomOrder()->first()->id
        ];
    }
}
