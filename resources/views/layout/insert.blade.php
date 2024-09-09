<div id="authorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Author</h2>
        <form action="{{ route('spotifys.createAuthor') }}" method="POST">
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
                <button type="button" class="Cancel" onclick="closeModal()">Cancel</button>
                <button type="submit" class="Add">Add Author</button>
            </div>
        </form>
    </div>
</div>
<div id="songModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Song</h2>
        <form action="{{ route('spotifys.createSong') }}" method="POST">
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
                <label for="premiere" class="block text-sm font-medium">Premiere Date</label>
                <input type="date" name="premiere" id="premiere" class="Input" required>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium">Duration (HH:MM:SS)</label>
                <input type="time" name="duration" id="duration" class="Input" step="1" required>
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
                <label for="url" class="block text-sm font-medium">URL</label>
                <input type="text" name="url" id="url" class="Input" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="Cancel" onclick="closeSongModal()">Cancel</button>
                <button type="submit" class="Add">Add Song</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('authorModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('authorModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const modal = document.getElementById('authorModal');
        if (event.target === modal) {
            closeModal();
        }
    }
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
</script>