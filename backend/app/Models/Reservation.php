<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function seat()
    {
        return $this->belongsTo('App\Models\Seat');
    }

    public function scheduled_movies()
    {
        return $this->belongsTo('App\Models\ScheduledMovie');
    }
}
