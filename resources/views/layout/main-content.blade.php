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
            <!-- Author section -->
            <section class="mb-8">
                <h2 class="text-2xl mb-4">Popular Artists</h2>
                <button id="add" class="addAuthor" onclick="openAuthorModal()">add author</button>
                <div class="grid grid-cols-10 gap-4">
                    @foreach($authors as $author)
                        <div class="text-center">
                            <img src="{{$author->url}}" alt="{{ $author->nickname }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                            <p>{{ $author->nickname }}</p>
                            <a href="{{ route('authors.show', $author->id) }}" class="Add">View</a>
                            <button id="edit-{{$author->id}}" class="Add" onclick="openAuthorModal({{$author->id}})">&#10000;</button>
                            <form action="{{route('authors.destroy', $author -> id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="Add">
                                    &#8861;
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- Song section -->
            <section class="mb-8">
                <h2 class="text-2xl mb-4">Popular Songs</h2>
                <button id="add" class="addSong" onclick="openSongModal()">add song</button>
                <div class="grid grid-cols-10 gap-4">
                    @foreach($songs as $song)
                        <div class="text-center">
                            <img src="{{$song->url}}" alt="{{ $song->title }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                            <p>{{ $song->title }}</p>
                            <a href="{{ route('songs.show', $song->id) }}" class="Add">View</a>
                            <button id="edit-{{$song->id}}" class="Add" onclick="openSongModal({{$song->id}})">&#10000;</button>
                            <form action="{{route('songs.destroy', $song -> id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="Add">
                                    &#8861;
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- Genre section -->
            <section class="mb-8">
                <h2 class="text-2xl mb-4">Popular Genres</h2>
                <button id="add" class="addGenre" onclick="openGenreModal()">add genre</button>
                <div class="grid grid-cols-10 gap-4">
                    @foreach($genres as $genre)
                        <div class="genresExpo">
                            <p>{{ $genre->type }}</p>
                            <a href="{{ route('genres.show', $genre->id) }}" class="Add">View</a>
                            <button id="edit-{{$genre->id}}" class="Add" onclick="openGenreModal({{$genre->id}})">&#10000;</button>
                            <form action="{{route('genres.destroy', $song -> id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="Add">
                                    &#8861;
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
</div>