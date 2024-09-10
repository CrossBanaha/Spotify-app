<!--this is for author create-->
<div id="authorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Author</h2>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nickname" class="block text-sm font-medium">Nickname</label>
                <input type="text" name="nickname" id="nickname" class="Input" required maxlength="30">
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium">URL</label>
                <input type="text" name="url" id="url" class="Input" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="Cancel" onclick="closeAuthorModal()">Cancel</button>
                <button type="submit" class="Add">Add Author</button>
            </div>
        </form>
    </div>
</div>
<!--this is for song create-->
<div id="songModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Song</h2>
        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
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
    function openAuthorModal() {
        document.getElementById('authorModal').classList.remove('hidden');
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
    function openSongModal() {
        document.getElementById('songModal').classList.remove('hidden');
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