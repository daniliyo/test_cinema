<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use App\Services\MovieService;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(MovieRequest $request)
    {
        $genres = $request->input('genre');
        $movie = Movie::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'release_date' => $request->input('release_date')
        ]);
        $movie->genres()->attach($genres);
        return redirect()->route('movies.show', $movie)
            ->with('message', 'The movie "'.$movie->title.'" has been successfully added');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genresOfMovie = MovieService::getGenresOfCurrentMovie($movie);
        return view('movies.update', compact(['movie', 'genresOfMovie']));
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        $genres = $request->input('genre');
        
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');
        $movie->save();
        $movie->genres()->sync($genres);

        return redirect()->route('movies.show', $movie)
            ->with('message', 'The movie "'.$movie->title.'" has been successfully updated');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
            ->with('message', 'The movie "'.$movie->title.'" has been successfully deleted');
    }
}
