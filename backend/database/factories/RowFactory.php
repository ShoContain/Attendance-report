<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auditorium;

class RowFactory extends Factory
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
            'auditorium_id'=>Auditorium::inRandomOrder()->first()->id,
            'number'=> $count,
            'seats' => $this->faker->numberBetween(10, 12)
        ];
    }
}
