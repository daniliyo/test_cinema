<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreRequest $request)
    {
        $genre = Genre::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('genres.show', $genre->id);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('genres.update', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->name = $request->input('name');
        $genre->save();
        return redirect()->route('genres.show', $genre->id);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
