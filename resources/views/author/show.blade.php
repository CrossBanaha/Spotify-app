@extends('layout.base')
@section('show-content')
    <section class="mb-8">
        <h1>{{ $author->nickname }}</h1>
        <h2>Songs:</h2>
        <ul>
            @foreach($author->songs as $song)
                <li>{{ $song->title }}</li>
            @endforeach
        </ul>
        <div class="btn-right">
            <a href="{{ route('spotifys.index') }}" class="btn-gray px-[15px] py-[5px] m-1">Return</a>
            <form action="{{route('authors.destroy', $author->id)}}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                    &#8861;
                </button>
            </form>
            <a href="{{ route('authors.edit', $author->id) }}" id="edit-{{$author->id}}" class="btn-white px-[15px] py-[5px] hover:px-[16px] m-1">
                &#10000;
            </a>
        </div>
    </section>
@endsection