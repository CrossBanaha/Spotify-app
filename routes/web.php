<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;
Route::resource('spotifys',SpotifyController::class)->only('index');
Route::post('spotifys/create-author', [SpotifyController::class, 'createAuthor'])->name('spotifys.createAuthor');