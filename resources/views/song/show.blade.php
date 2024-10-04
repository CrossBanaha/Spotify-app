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
            <a href="{{ route('spotifys.index') }}" class="btn-gray px-[15px] py-[5px] m-1">Return</a>
            <form action="{{route('songs.destroy', $song -> id)}}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                    &#8861;
                </button>
            </form>
            <a href="{{ route('songs.edit', $song->id) }}" id="edit-{{$song->id}}" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                &#10000;
            </a>
        </div>
    </section>
@endsection