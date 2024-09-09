<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;
Route::resource('spotifys',SpotifyController::class)->only('index');
Route::post('spotifys/create-author', [SpotifyController::class, 'createAuthor'])->name('spotifys.createAuthor');
Route::get('artists/{id}/songs', [SpotifyController::class, 'getArtistSongs']);
Route::get('artists/{id}', [SpotifyController::class, 'editArtist']);
Route::put('artists/{id}', [SpotifyController::class, 'updateArtist']);
Route::delete('artists/{id}', [SpotifyController::class, 'deleteArtist']);
Route::post('spotifys/create-song',[SpotifyController::class, 'createSong'])->name('spotifys.createSong');