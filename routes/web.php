<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;

Route::resource('spotifys',SpotifyController::class)->only('index');