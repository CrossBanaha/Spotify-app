@extends('layout.base')
@section('show-content')
    {{-- Author section --}}
    <section class="mb-8">
        <h2 class="flex justify-between mb-4">
            <div class="font-bold text-2xl">Artists</div>
            <a href="{{ route('authors.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
            </a>
        </h2>
        <div class="flex flex-row gap-4">
            @foreach($authors as $author)
                <div class="select w-[10%]">
                    <a href="{{ route('authors.show', $author->id) }}">
                        <img src="{{$author->url ?? asset('/images/user.png') }}" alt="{{ $author->nickname }}" class="rounded-full h-24 w-24 mx-auto my-2">
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
            <a href="{{ route('songs.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
            </a>
        </h2>
        <div class="flex flex-row gap-4">
            @foreach($songs as $song)
                <div class="select w-[10%]">
                    <a href="{{ route('songs.show', $song->id) }}">
                        <img src="{{$song->url ?? asset('/images/user.png') }}" alt="{{ $song->title }}" class="rounded-full h-24 w-24 mx-auto mb-2">
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
            <a href="{{ route('genres.create') }}" class="btn-white px-[15px] py-[5px] hover:px-[16px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
            </a>
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