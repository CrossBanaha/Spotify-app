<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index() //GET
    {}
    public function create() //GET
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('song.insert', compact('authors','genres'));
    }
    public function store(Request $request) //POST
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:30',
            'premiere' => 'required|date',
            'duration' => 'required|date_format:H:i:s',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);
        $song = Song::create($validatedData);
        $song->genres()->sync($request->input('genres'));
        return redirect()->route('spotifys.index')->with('success', 'Song created successfully!');
    }
    public function show(Song $song) //GET
    {
        return view('song.show', compact('song'));
    }
    public function edit(Song $song) //GET
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('song.insert', compact('song', 'authors', 'genres'));
    }
    public function update(Request $request, Song $song) //PUT, PATCH
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:30',
            'premiere' => 'required|date',
            'duration' => 'required|date_format:H:i:s',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);
        $song->update($validatedData);
        $song->genres()->sync($request->input('genres'));
        return redirect()->route('spotifys.index')->with('success', 'Song updated successfully!');
    }
    public function destroy(Song $song) //DELETE
    {
        $song->genres()->detach();
        $song->delete();
        return redirect()->route('spotifys.index')->with('success','Song delete successful!');
    }
}