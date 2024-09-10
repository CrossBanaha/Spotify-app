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
    {}
    public function store(StoreSpotifyRequest $request)
    {}
    public function show(Spotify $spotify)
    {}
    public function edit(Spotify $spotify)
    {}
    public function update(UpdateSpotifyRequest $request, Spotify $spotify)
    {}
    public function destroy(Spotify $spotify)
    {}
}