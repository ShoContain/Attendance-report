<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

class MovieFactory extends Factory
{

    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'minutes' => $this->faker->numberBetween(60,180),
            'published_year' => $this->faker->year()
        ];
    }
}
