<?php

use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
Route::resource('spotifys',SpotifyController::class)->only('index');
Route::resource('authors',AuthorController::class)->except(['index','create','edit']);
Route::get('authors/{author}/songs', [AuthorController::class, 'show'])->name('authors.show');
Route::resource('songs',SongController::class)->except(['index','create','edit']);
Route::resource('genres',GenreController::class)->only('store');