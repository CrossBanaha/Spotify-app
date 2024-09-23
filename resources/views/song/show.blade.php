@extends('layout.app')
@section('content')
<div class="content col-span-7">
    <main>
        <header>
            <div class="direction">
                <button id="before" class="Before"><</button>
                <button id="after" class="After">></button>
            </div>
            <div class="Account">
                <button id="register" class="Register">Register</button>
                <button id="login" class="Login">Login</button>
            </div>
        </header>
        <div class="submain">
            <section class="mb-8">
                <h1>{{ $song->title }}</h1>
                <h2>Description: {{ $song->description }}</h2>
                <h2>Premiere Date: {{ $song->premiere }}</h2>
                <h2>Duration: {{ $song->duration }}</h2>
                <h2>Author: {{ $song->author->nickname }}</h2>
                <h2>Genres:</h2>
                <ul>
                    @foreach($song->genres as $genre)
                        <li>{{ $genre->type }}</li>
                    @endforeach
                </ul>
            </section>
        </div>
@endsection