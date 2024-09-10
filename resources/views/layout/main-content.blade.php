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
        <section class="mb-8">
            <h2 class="text-2xl mb-4">Popular Artists</h2>
            <button id="add" class="addAuthor" onclick="openAuthorModal()">add author</button>
            <div class="grid grid-cols-10 gap-4">
                @foreach($authors as $author)
                    <div class="text-center">
                        <img src="{{$author->url}}" alt="{{ $author->nickname }}" class="rounded-full h-24 w-24 mx-auto mb-2" onclick="showSAuthorModal({{$author->id}})">
                        <p>{{ $author->nickname }}</p>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="mb-8">
            <h2 class="text-2xl mb-4">Popular Songs</h2>
            <button id="add" class="addSong" onclick="openSongModal()">add song</button>
            <div class="grid grid-cols-10 gap-4">
            @foreach($songs as $song)
                <div class="text-center">
                    <img src="{{$song->url}}" alt="{{ $song->title }}" class="rounded-full h-24 w-24 mx-auto mb-2" onclick="showSSongModal({{$song->id}})">
                    <p>{{ $song->title }}</p>
                </div>
            @endforeach
            </div>
        </section>
        <section class="mb-8">
            <h2 class="text-2xl mb-4">Popular Genres</h2>
            <button id="add" class="addGenre" onclick="openGenreModal()">add genre</button>
            <div class="grid grid-cols-10 gap-4">
                @foreach($genres as $genre)
                    <div class="text-center">
                        <p>{{ $genre->type }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</div>