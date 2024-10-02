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
                    <h1>{{ $author->nickname }}</h1>
                    <h2>Songs:</h2>
                    <ul>
                        @foreach($author->songs as $song)
                            <li>{{ $song->title }}</li>
                        @endforeach
                    </ul>
                </section>
            </div>
            <a href="{{ route('authors.edit', $author->id) }}" id="edit-{{$author->id}}" class="Add">&#10000;</a>
            <form action="{{route('authors.destroy', $author->id)}}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button class="Add" onclick="showFlashMessage('delete successful')">
                    &#8861;
                </button>
            </form>
        </main>
    </div>
@endsection