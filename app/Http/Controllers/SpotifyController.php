<?php

namespace App\Http\Controllers;

use App\Models\Spotify;
use App\Models\Author;
use App\Models\Song;
use App\Http\Requests\StoreSpotifyRequest;
use App\Http\Requests\UpdateSpotifyRequest;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function index()
    {
        $spotify = Spotify::all();
        $authors = Author::all();
        $songs = Song::all();
        return view('spotifys.index', compact('spotify','authors','songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function createAuthor(Request $request){
        $validatedData = $request->validate([
            'nickname' => 'required|string|max:30',
            'url' => 'required|string|max:255'
        ]);
        Author::create($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Author created successfully!');
    }
    public function getArtistSongs($id)
    {
        $author = Author::with('songs')->find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return response()->json([
            'nickname' => $author->nickname,
            'songs' => $author->songs
        ]);
    }
    public function destroyAuthor(Author $author){
        $author->delete();
        return redirect()->route('spotifys.index')->with('success', 'Author deleted successfully!');
    }
    public function createSong(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'required|string|max:60',
            'premiere' => 'required|date',
            'duration' => 'required|date_format:H:i:s',
            'author_id' => 'required|exists:authors,id',
            'url' => 'required|string|max:255'
        ]);
        Song::create($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Song created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpotifyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Spotify $spotify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spotify $spotify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpotifyRequest $request, Spotify $spotify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spotify $spotify)
    {
        //
    }
}