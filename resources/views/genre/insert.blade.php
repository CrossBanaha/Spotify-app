@extends('layout.base')
@section('show-content')
    <section class="mb-8">
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
                        <div class="error">{{ $message }}</div>
                    @enderror
            </div>
            <div class="btn-right">
                <a href="{{ route('spotifys.index') }}" class="btn-gray px-[15px] py-[5px] m-1">Cancel</a>
                <button type="submit" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                    {{isset($genre) ? 'Edit Genre' : 'Add Genre'}}
                </button>
            </div>
        </form>
    </section>
@endsection