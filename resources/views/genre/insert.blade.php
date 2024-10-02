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
                <!--this is for genres create-->
                    <div class="Modal">
                        <h2 class="text-xl font-bold mb-4">{{ isset($genre) ? 'Edit Genre' : 'Add New Genre'}}</h2>
                        <form method="POST" action="{{ isset($genre) ? route('genres.update', $genre) : route('genres.store') }}">
                            @csrf
                            @if (isset($genre))
                                @method('PUT')
                            @endif
                            <div class="mb-4">
                                <label for="type" class="block text-sm font-medium">type</label>
                                <input type="text" name="type" id="type" value="{{ old('type', $genre->type ?? '') }}" class="Input" autofocus>
                                @error('type')
                                    <div class="text-red-500 border-red-600 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ route('spotifys.index') }}" class="Cancel">Cancel</a>
                                <button type="submit" class="Add">Add Genre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection