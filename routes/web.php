<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;
Route::resource('spotifys',SpotifyController::class)->only('index');
Route::post('spotifys/create-author', [SpotifyController::class, 'createAuthor'])->name('spotifys.createAuthor');
Route::get('artists/{id}/songs', [SpotifyController::class, 'getArtistSongs']);
Route::delete('author/{id}', [SpotifyController::class, 'destroyAuthor'])->name('author.destroyAuthor');
Route::post('spotifys/create-song',[SpotifyController::class, 'createSong'])->name('spotifys.createSong');