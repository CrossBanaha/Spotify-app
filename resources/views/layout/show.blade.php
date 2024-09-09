<div id="artistModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 id="artistName" class="text-xl font-bold mb-4"></h2>
        <h1 class="font-bold">Canciones relacionadas</h1>
        <ul id="artistSongs"></ul>
        <div class="flex justify-end mt-6">
        <button class="Cancel" onclick="closeArtistModal()">Close</button>
        <button class="Add" onclick="openEditModal()">Edit</button>
        <button class="Add" onclick="deleteArtist()">Delete</button>    
        </div>
    </div>
</div>
<!-- Modal para editar el artista -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <form id="editArtistForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nickname" class="block text-sm font-medium">Nickname</label>
                <input type="text" id="editNickname" name="nickname" value="{{old('nickname')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium">Image URL</label>
                <input type="text" id="editUrl" name="url" value="{{old('url')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="Add">Save Changes</button>
                <button type="button" class="Cancel" onclick="closeEditModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
    let currentArtistId = null;
    function showArtistModal(id) {
        fetch(`/artists/${id}/songs`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('artistName').innerText = data.nickname;
                let songsList = document.getElementById('artistSongs');
                songsList.innerHTML = '';
                data.songs.forEach(song => {
                    let listItem = document.createElement('li');
                    listItem.textContent = song.title;
                    songsList.appendChild(listItem);
                });
                document.getElementById('artistModal').classList.remove('hidden');
            });
    }
    function closeArtistModal() {
        document.getElementById('artistModal').classList.add('hidden');
    }
    function openEditModal() {
        // Llenar el formulario con los datos actuales del artista
        fetch(`/artists/${currentArtistId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editNickname').value = data.nickname;
                document.getElementById('editUrl').value = data.url;
                document.getElementById('editArtistForm').action = `/artists/${currentArtistId}`;
                document.getElementById('editModal').classList.remove('hidden');
            });

        // Cerrar el modal de detalles
        closeArtistModal();
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function deleteArtist() {
        if (confirm('Are you sure you want to delete this artist?')) {
            fetch(`/artists/${currentArtistId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('Artist deleted successfully!');
                    location.reload();
                } else {
                    alert('There was a problem deleting the artist.');
                }
            });
        }
    }
</script>
