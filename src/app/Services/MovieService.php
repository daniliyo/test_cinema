<?php

namespace App\Services;

use App\Models\Movie;

class MovieService {
    static public function getGenresOfCurrentMovie(Movie $movie){
        $result = [];
        $movie->genres->each(function($item) use (&$result){
            array_push($result, $item->id);
        });
        return $result;
    }
}