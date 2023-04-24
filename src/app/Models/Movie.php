<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
    ];
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
