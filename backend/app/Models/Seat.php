<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function row()
    {
        return $this->belongsTo('App\Models\Row');
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
