<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {}
    public function create()
    {
        return view('genre.insert');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:30'
        ]);
        Genre::create($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Genre created successfully!');
    }
    public function show(Genre $genre)
    {
        return view('genre.show', compact('genre'));
    }
    public function edit(Genre $genre)
    {
        return view('genre.insert', compact('genre'));
    }
    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:30'
        ]);
        $genre->update($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Genre updated successfully!');
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('spotifys.index')->with('success', 'Genre deleted successfully!');
    }
}