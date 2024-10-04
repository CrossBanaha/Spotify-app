@extends('layout.base')
@section('show-content')
    {{-- Author section --}}
    <section class="mb-8">
        <h2 class="flex justify-between mb-4">
            <div class="font-bold text-2xl">Artists</div>
            <a href="{{ route('authors.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">Add author</a>
        </h2>
        <div class="flex flex-row gap-4">
            @foreach($authors as $author)
                <div class="select w-[10%]">
                    <a href="{{ route('authors.show', $author->id) }}">
                        <img src="{{$author->url}}" alt="{{ $author->nickname }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                    </a>
                    <p>{{ $author->nickname }}</p>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Song section --}}
    <section class="mb-8">
        <h2 class="flex justify-between mb-4">
            <div class="font-bold text-2xl">Songs</div>    
            <a href="{{ route('songs.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">Add song</a>
        </h2>
        <div class="flex flex-row gap-4">
            @foreach($songs as $song)
                <div class="select w-[10%]">
                    <a href="{{ route('songs.show', $song->id) }}">
                        <img src="{{$song->url}}" alt="{{ $song->title }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                    </a>
                    <p>{{ $song->title }}</p>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Genre section --}}
    <section class="mb-8">
        <h2 class="flex justify-between mb-4">
            <div class="font-bold text-2xl">Genres</div>
            <a href="{{ route('genres.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">Add genre</a>
        </h2>
        <div class="grid grid-cols-10 gap-4">
            @foreach($genres as $genre)
                <a href="{{ route('genres.show', $genre->id) }}">
                    <div class="text-center">
                        <p class="select">{{ $genre->type }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection