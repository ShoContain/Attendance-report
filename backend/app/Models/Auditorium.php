<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;

    public function sheduledMovies()
    {
        return $this->hasMany('App\sheduledMovies');
    }
 
}
