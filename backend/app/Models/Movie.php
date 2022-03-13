<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = "movies";

    public $timestamps = false;

    protected $fillable = ['name','description','minutes','published_year','image_path'];

    public function scheduledMovies()
    {
        return $this->hasMany('App\Models\scheduledMovie');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
