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
                    <div class="Modal">
                        <h2 class="text-xl font-bold mb-4">{{ isset($author) ? 'Edit Author' : 'Add New Author' }}</h2>
                        <form id="editForm" method="POST" action="{{ isset($author) ? route('authors.update', $author) : route('authors.store') }}">
                            @csrf
                            @if (isset($author))
                                @method('PUT')
                            @endif
                            <div class="mb-4">
                                <label for="nickname" class="block text-sm font-medium">Nickname</label>
                                <input type="text" placeholder="Enter nickname for author" name="nickname" value="{{ old('nickname', $author->nickname ?? '') }}" class="Input" autofocus>
                                @error('nickname')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="url" class="block text-sm font-medium">URL</label>
                                <input type="text" placeholder="Enter url for author image" name="url" id="url" value="{{ old('url', $author->url ?? '') }}" class="Input" autofocus>
                                @error('url')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <a href="{{route('spotifys.index')}}" class="Cancel">Cancel</a>
                                <button type="submit" class="Add">{{ isset($author) ? 'Edit Author' : 'Add Author' }}</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection