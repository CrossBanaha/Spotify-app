<!--this is for author show-->
<div id="sAuthorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 id="authorName" class="text-xl font-bold mb-4"></h2>
        <h1 class="font-bold">Songs</h1>
        <ul id="authorSongs"></ul>
        <div class="flex justify-end mt-6">
            <button class="Cancel" onclick="closeSAuthorModal()">Close</button>
        </div>
    </div>
</div>
<!--this is for song show-->
<div id="sSongModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 id="songTitle" class="text-xl font-bold mb-4"></h2>
        <h2 id="songDescription"></h2>
        <h2 id="songPremiere"></h2>
        <h2 id="songDuration"></h2>
        <h2 id="songAuthor"></h2>
        <h3 class="font-bold">Genres:</h3>
        <ul id="songGenres"></ul>
        <div class="flex justify-end mt-6">
            <button class="Cancel" onclick="closeSSongModal()">Close</button>
        </div>
    </div>
</div>
<script>
    //Function to show author details modal
    function showSAuthorModal(id) {
        fetch(`/authors/${id}/songs`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }
            document.getElementById('authorName').innerText = data.nickname;
            let songsList = document.getElementById('authorSongs');
            songsList.innerHTML = '';
            data.songs.forEach(song => {
                let listItem = document.createElement('li');
                listItem.textContent = song.title;
                songsList.appendChild(listItem);
            });
            document.getElementById('sAuthorModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching artist data:', error);
        });
    }
    function closeSAuthorModal() {
        document.getElementById('sAuthorModal').classList.add('hidden');
    }
    // Function to show song details modal
    function showSSongModal(id) {
        fetch(`/songs/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('songTitle').innerText = data.title;
            document.getElementById('songDescription').innerText = data.description;
            document.getElementById('songPremiere').innerText = `Premiere Date: ${data.premiere}`;
            document.getElementById('songDuration').innerText = `Duration: ${data.duration}`;
            document.getElementById('songAuthor').innerText = `Author: ${data.author.nickname}`;
            let genresList = document.getElementById('songGenres');
            genresList.innerHTML = '';
            data.genres.forEach(genre => {
                let listItem = document.createElement('li');
                listItem.textContent = genre.type;
                genresList.appendChild(listItem);
            });

            document.getElementById('sSongModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching song data:', error);
        });
    }
    function closeSSongModal() {
        document.getElementById('sSongModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const songModal = document.getElementById('sSongModal');
        if (event.target === songModal) {
            closeSSongModal();
        }
    }
</script>