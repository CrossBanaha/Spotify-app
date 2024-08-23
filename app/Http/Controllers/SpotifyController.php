<?php

namespace App\Http\Controllers;

use App\Models\Spotify;
use App\Http\Requests\StoreSpotifyRequest;
use App\Http\Requests\UpdateSpotifyRequest;

class SpotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spotify = Spotify::all();
        return view('spotifys.index', compact('spotify'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
