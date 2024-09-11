<!--this is for author create and edit (upgrade)-->
<div id="authorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Author</h2>
        <form id="editForm" method="POST" action="{{ old('author_id') ? route('authors.update', old('author_id')) : route('authors.store') }}">
            @csrf
            <input type="hidden" name="_method" id="_method" value="{{ old('author_id') ? 'PUT' : 'POST' }}">
            <div class="mb-4">
                <label for="nickname" class="block text-sm font-medium">Nickname</label>
                <input type="text" placeholder="Enter nickname for author" name="nickname" id="nickname" value="{{ old('nickname') }}" class="Input" required maxlength="30" autofocus>
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium">URL</label>
                <input type="text" placeholder="Enter url for author image" name="url" id="url" value="{{ old('url') }}" class="Input" required maxlength="255">
            </div>
            <div class="flex justify-end">
                <button type="button" class="Cancel" onclick="closeAuthorModal()">Cancel</button>
                <button type="submit" class="Add">Save Author</button>
            </div>
        </form>
    </div>
</div>
<!--this is for song create and edit (upgrade)-->
<div id="songModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Song</h2>
        <form id="songForm" method="POST" action="{{ route('songs.store') }}">
            @csrf
            <input type="hidden" name="_method" id="_method" value="{{ old('song_id') ? 'PUT' : 'POST' }}">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" class="Input" required maxlength="30">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <input type="text" name="description" id="description" class="Input" maxlength="60">
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium">URL</label>
                <input type="text" name="url" id="url" class="Input" required>
            </div>
            <div class="mb-4">
                <label for="premiere" class="block text-sm font-medium">Premiere Date</label>
                <input type="date" name="premiere" id="premiere" class="Input" required>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium">Duration (MM:SS)</label>
                <input type="time" name="duration" id="duration" class="Input" step="1" max="00:59:59" required>
            </div>
            <div class="mb-4">
                <label for="author_id" class="block text-sm font-medium">Author</label>
                <select name="author_id" id="author_id" class="Input" required>
                    <option value="" disabled selected>Select an author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->nickname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="genre_id" class="block text-sm font-medium">Genres</label>
                @foreach($genres as $genre)
                    <label>
                        <input type="checkbox" value="{{ $genre->id }}" name="genres[]" 
                        @if (old('genres') && in_array($genre->id, old('genres'))) checked @endif>
                        {{ $genre->type }}
                    </label>
                @endforeach
            </div>
            <div class="flex justify-end">
                <button type="button" class="Cancel" onclick="closeSongModal()">Cancel</button>
                <button type="submit" class="Add">Add Song</button>
            </div>
        </form>
    </div>
</div>
<!--this is for genres create-->
<div id="genreModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Genre</h2>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium">type</label>
                <input type="text" name="type" id="type" class="Input" required maxlength="30">
            </div>
            <div class="flex justify-end">
                <button type="button" class="Cancel" onclick="closeGenreModal()">Cancel</button>
                <button type="submit" class="Add">Add Genre</button>
            </div>
        </form>
    </div>
</div>
<script>
    //this is for author modal
    var authors = @json($authors);
    function openAuthorModal(id = null) {
        const editForm = document.getElementById('editForm');
        if (id) {
            //Get the author with their ID from the global author list
            const author = authors.find(author => author.id === id);
            //Ensure fields are filled out correctly
            document.getElementById('nickname').value = author.nickname;
            document.getElementById('url').value = author.url;
            //Configure the action and method for editing
            editForm.action = `/authors/${id}`;
            document.getElementById('authorModal').classList.remove('hidden');
            editForm._method.value = 'PUT';  //Ensures that the PUT method is done
        } else {
            //Clear fields to create a new author
            document.getElementById('nickname').value = '';
            document.getElementById('url').value = '';
            //Configure the action to create a new author
            editForm.action = '{{ route('authors.store') }}';
            document.getElementById('authorModal').classList.remove('hidden');
            editForm._method.value = 'POST';  //Ensures that the POST method is done
        }
    }
    function closeAuthorModal() {
        document.getElementById('authorModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const modal = document.getElementById('authorModal');
        if (event.target === modal) {
            closeModal();
        }
    }
    //this is for song modal
    var songs = @json($songs);
    function openSongModal(id = null) {
        const songForm = document.getElementById('songForm');
        if (id) {
            // Get the song with their ID from the global song list
            const song = songs.find(song => song.id === id);
            // Ensure fields are filled out correctly
            document.getElementById('title').value = song.title;
            document.getElementById('description').value = song.description;
            document.getElementById('url').value = song.url;
            document.getElementById('premiere').value = song.premiere;
            document.getElementById('duration').value = song.duration;
            document.getElementById('author_id').value = song.author_id;
            // Configure the action and method for editing
            songForm.action = `/songs/${id}`;
            document.getElementById('songModal').classList.remove('hidden');
            songForm._method.value = 'PUT';  // Ensures that the PUT method is done
        } else {
            // Clear fields to create a new song
            document.getElementById('title').value = '';
            document.getElementById('description').value = '';
            document.getElementById('url').value = '';
            document.getElementById('premiere').value = '';
            document.getElementById('duration').value = '';
            document.getElementById('author_id').value = '';
            // Configure the action to create a new song
            songForm.action = '{{ route('songs.store') }}';
            document.getElementById('songModal').classList.remove('hidden');
            songForm._method.value = 'POST';  // Ensures that the POST method is done
        }
    }
    function closeSongModal() {
        document.getElementById('songModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const songModal = document.getElementById('songModal');
        if (event.target === songModal) {
            closeSongModal();
        }
    }
    //this is for genre modal
    function openGenreModal() {
        document.getElementById('genreModal').classList.remove('hidden');
    }
    function closeGenreModal() {
        document.getElementById('genreModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const modal = document.getElementById('genreModal');
        if (event.target === modal) {
            closeModal();
        }
    }
</script>