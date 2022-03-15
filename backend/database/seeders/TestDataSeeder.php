<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make auditoriums & rows
        \App\Models\Auditorium::factory()->count(5)->create()->each(function ($auditorium) {
            \App\Models\Row::factory()->count(10)->create(['auditorium_id' => $auditorium->id]);
        });

        // make seats
        $rows = \App\Models\Row::all()->toArray();
        foreach ($rows as $row) {
            for ($i = 1; $i <= $row['seats']; $i++) {
                \App\Models\Seat::create(['row_id' => $row['id'], 'number' => $i]);
            }
        }

        // make scheduledMovies
        \App\Models\ScheduledMovie::factory()->count(20)->create()->each(function ($scheduledMovie) {
            // make reservations
            \App\Models\Reservation::factory()->count(10)->create(['movie_id'=>$scheduledMovie->movie_id]);
        });
    }
}
