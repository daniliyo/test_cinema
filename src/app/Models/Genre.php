<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ]; 
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    public function movies() {
        return $this->belongsToMany(Movie::class, 'genre_movie');
    }
}
