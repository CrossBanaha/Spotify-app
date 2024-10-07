@extends('layout.base')
@section('show-content')
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
        <div class="btn-right">
            <a href="{{ route('spotifys.index') }}" class="btn-gray px-[15px] py-[5px] m-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                    <path d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753"/>
                </svg>
            </a>
            <form action="{{route('songs.destroy', $song -> id)}}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>
                </button>
            </form>
            <a href="{{ route('songs.edit', $song->id) }}" id="edit-{{$song->id}}" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                &#10000;
            </a>
        </div>
    </section>
@endsection