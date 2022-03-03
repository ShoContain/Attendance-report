<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMovie extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function auditorium()
    {
        return $this->belongsTo('App\Models\Auditorium');
    }
}
