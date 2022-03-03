<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;

    public function scheduledMovies()
    {
        return $this->hasMany('App\Models\ScheduledMovie');
    }

    public function rows()
    {
        return $this->hasMany('App\Models\Row');
    }
 
}
