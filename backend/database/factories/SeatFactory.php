<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Row;

class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 0;
        $count ++;
        if ($count >= 11) {
            $count = 1;
        }
        return [
            'row_id'=>Row::inRandomOrder()->first()->id,
            'number'=> $count,
        ];
    }
}
