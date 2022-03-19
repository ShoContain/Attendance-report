<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMovie extends Model
{
    use HasFactory;

    protected $table = "scheduled_movies";

    public $timestamps = false;

    protected $fillable = ['movie_id', 'start', 'end', 'auditorium_id','price'];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function auditorium()
    {
        return $this->belongsTo('App\Models\Auditorium');
    }
}
