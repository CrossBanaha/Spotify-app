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
                    <!--this is for song create and edit (upgrade)-->
                    <div class="Modal">
                        <h2 class="text-xl font-bold mb-4">{{ isset($song) ? 'Edit Song' : 'Add New Song' }}</h2>
                        <form id="songForm" method="POST" action="{{ isset($song) ? route('songs.update', $song) : route('songs.store') }}">
                            @csrf
                            @if (isset($song))
                                @method('PUT')
                            @endif
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium">Title</label>
                                <input type="text" placeholder="Enter title for song" name="title" value="{{ old('title', $song->title ?? '') }}" class="Input" autofocus>
                                @error('title')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium">Description</label>
                                <input type="text" name="description" value="{{ old('description', $song->description ?? '') }}" class="Input" autofocus>
                                @error('description')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="url" class="block text-sm font-medium">URL</label>
                                <input type="text" name="url" id="url" value="{{ old('url', $song->url ?? '') }}" class="Input" autofocus>
                                @error('url')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="premiere" class="block text-sm font-medium">Premiere Date</label>
                                <input type="date" name="premiere" id="premiere" value="{{ old('premiere', $song->premiere ?? '') }}" class="Input" autofocus>
                                @error('premiere')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="duration" class="block text-sm font-medium">Duration (MM:SS)</label>
                                <input type="time" name="duration" id="duration" value="{{ old('duration', $song->duration ?? '') }}" class="Input" step="1" max="00:59:59" autofocus>
                                @error('duration')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="author_id" class="block text-sm font-medium">Author</label>
                                <select name="author_id" id="author_id" class="Input" autofocus>
                                    <option value="" disabled selected>Select an author</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->nickname }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="genre_id" class="block text-sm font-medium">Genres</label>
                                @foreach($genres as $genre)
                                    <label>
                                        <input type="checkbox" value="{{ $genre->id }}" id="genres" name="genres[]" 
                                        @if (old('genres') && in_array($genre->id, old('genres'))) checked @endif>
                                        {{ $genre->type }}
                                        @error('genres')
                                            <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                        @enderror
                                    </label>
                                @endforeach
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ route('spotifys.index') }}" class="Cancel">Cancel</a>
                                <button type="submit" class="Add">{{ isset($song) ? 'Edit Song' : 'Add Song' }}</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection