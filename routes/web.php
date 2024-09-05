<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::resource('spotifys',SpotifyController::class)->only('index');