<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::with(['genres'])->get();        
        return response()->json($movie);
    }

    public function show(Movie $movie)
    {
        return response()->json($movie->load('genres'));
    }
}
