<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index() //GET
    {}
    public function create() //GET
    {}
    public function store(Request $request) //POST
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'required|string|max:60',
            'premiere' => 'required|date',
            'duration' => 'required|date_format:H:i:s',
            'author_id' => 'required|exists:authors,id',
            'url' => 'required|string|max:255',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);
        $song = Song::create($validatedData);
        $song->genres()->sync($request->input('genres'));
        return redirect()->route('spotifys.index')->with('success', 'Song created successfully!');
    }
    public function show(Song $song) //GET
    {
        $song = $song->load('author', 'genres');
        return response()->json([
            'title' => $song->title,
            'description' => $song->description,
            'premiere' => $song->premiere->format('Y-m-d'),
            'duration' => $song->duration->format('H:i:s'),
            'author' => [
                'nickname' => $song->author->nickname,
            ],
            'genres' => $song->genres->map(function($genre) {
                return [
                    'type' => $genre->type,
                ];
            }),
        ]);
    }
    public function edit(Song $song) //GET
    {}
    public function update(Request $request, Song $song) //PUT, PATCH
    {}
    public function destroy(Song $song) //DELETE
    {}
}