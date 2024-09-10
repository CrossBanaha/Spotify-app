<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {}
    public function create()
    {}
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:30'
        ]);
        Genre::create($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Author created successfully!');
    }
    public function show(Genre $genre)
    {}
    public function edit(Genre $genre)
    {}
    public function update(Request $request, Genre $genre)
    {}
    public function destroy(Genre $genre)
    {}
}