<?php

namespace App\Http\Controllers;

use App\Models\Spotify;
use App\Models\Author;
use App\Models\Song;
use App\Models\Genre;
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
        $genres = Genre::all();
        return view('spotifys.index', compact('spotify','authors','songs','genres'));
    }
    public function create()
    {
        //
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