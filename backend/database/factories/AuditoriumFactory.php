<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auditorium;

class AuditoriumFactory extends Factory
{
    protected $model = Auditorium::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => strtoupper($this->faker->randomLetter()),
            'capacity'=>$this->faker->numberBetween(100,200)
        ];
    }
}
