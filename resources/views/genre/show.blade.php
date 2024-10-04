@extends('layout.base')
@section('show-content')
    <section class="mb-8">
        <h1>{{ $genre->type }}</h1>
        <div class="btn-right">
            <a href="{{ route('spotifys.index') }}" class="btn-gray px-[15px] py-[5px] m-1">Return</a>
            <form action="{{ route('genres.destroy', $genre->id) }}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                    &#8861;
                </button>
            </form>
            <a href="{{ route('genres.edit', $genre->id) }}" id="edit-{{$genre->id}}" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                &#10000;
            </a>
        </div>
    </section>
@endsection