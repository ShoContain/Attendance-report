<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make auditoriums
        \App\Models\Auditorium::factory()->count(5)->create()->each(function ($auditorium) {
            \App\Models\Row::factory()->count(10)->create(['auditorium_id' => $auditorium->id])->each(function ($row) {
                \App\Models\Seat::factory()->count(10)->create(['row_id' => $row->id]);
            });
        });

        // make scheduledMovies
        \App\Models\ScheduledMovie::factory()->count(20)->create()->each(function ($scheduledMovie) {
            // make reservations
            \App\Models\Reservation::factory()->count(10)->create(['movie_id'=>$scheduledMovie->movie_id]);
        });

    }
}
