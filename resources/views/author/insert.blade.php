@extends('layout.base')
@section('show-content')
    <section class="mb-8">
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
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium">URL</label>
                <input type="text" placeholder="Enter url for author image" name="url" id="url" value="{{ old('url', $author->url ?? '') }}" class="Input" autofocus>
                @error('url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-right">
                <a href="{{route('spotifys.index')}}" class="btn-gray px-[15px] py-[5px] m-1">Cancel</a>
                <button type="submit" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">{{ isset($author) ? 'Edit Author' : 'Add Author' }}</button>
            </div>
        </form>
    </section>
@endsection