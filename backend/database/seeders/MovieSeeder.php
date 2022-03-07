<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Movie::factory()->count(10)->create()->each(function ($movie) {
            \App\Models\ScheduledMovie::factory()->count(3)->create(['movie_id' => $movie->id]);
        });
    }
}
