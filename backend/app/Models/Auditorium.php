<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;

    protected $table = "auditoriums";

    public $timestamps = false;

    protected $fillable = ['name', 'capacity'];

    public function scheduledMovies()
    {
        return $this->hasMany('App\Models\ScheduledMovie');
    }

    public function rows()
    {
        return $this->hasMany('App\Models\Row');
    }
 
}
