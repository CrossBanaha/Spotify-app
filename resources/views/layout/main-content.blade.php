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
            <h2 class="text-2xl mb-4">Artistas populares</h2>
            <div class="flex space-x-4">
                <!-- Repite este bloque para cada artista -->
                <div class="text-center">
                    <img src="/path-to-artist.jpg" alt="Artist Name" class="rounded-full h-24 w-24 mx-auto mb-2">
                    <p>Artist Name</p>
                    <p>Artista</p>
                </div>
                <!-- Fin del bloque del artista -->
            </div>
        </section>
        <section>
            <h2 class="text-2xl mb-4">Álbumes populares</h2>
            <div class="grid grid-cols-5 gap-4">
                <!-- Repite este bloque para cada álbum -->
                <div class="text-center">
                    <img src="/path-to-album.jpg" alt="Album Name" class="h-24 w-24 mx-auto mb-2">
                    <p>Album Name</p>
                </div>
                <!-- Fin del bloque del álbum -->
            </div>
        </section>
    </main>
</div>