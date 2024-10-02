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
                <h2 class="flex justify-between mb-4">
                    <div class="text-2xl">
                        Popular Artists 
                    </div>
                    <a href="{{ route('authors.create') }}" class="Add">Add author</a>
                </h2>
                <div class="flex flex-row gap-4">
                    @foreach($authors as $author)
                        <div class="text-center">
                            <a href="{{ route('authors.show', $author->id) }}">
                                <img src="{{$author->url}}" alt="{{ $author->nickname }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                            </a>
                            <p>{{ $author->nickname }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- Song section -->
            <section class="mb-8">
                <h2 class="flex justify-between mb-4">
                    <div class="text-2xl">
                        Popular Songs
                    </div>    
                    <a href="{{ route('songs.create') }}" class="Add">Add song</a>
                </h2>
                <div class="flex flex-row gap-4">
                    @foreach($songs as $song)
                        <div class="text-center">
                            <a href="{{ route('songs.show', $song->id) }}">
                                <img src="{{$song->url}}" alt="{{ $song->title }}" class="rounded-full h-24 w-24 mx-auto mb-2">
                            </a>
                            <p>{{ $song->title }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- Genre section -->
            <section class="mb-8">
                <h2 class="flex justify-between mb-4">
                    <div class="text-2xl">
                        Popular Genres
                    </div>
                    <a href="{{ route('genres.create') }}" class="Add">Add genre</a>
                </h2>
                <div class="grid grid-cols-10 gap-4">
                    @foreach($genres as $genre)
                    <a href="{{ route('genres.show', $genre->id) }}">
                        <div class="genresExpo">
                            <p>{{ $genre->type }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
</div>