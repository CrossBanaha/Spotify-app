<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Author;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $genres = ['pop', 'rock','jazz'];
        foreach ($genres as $genre) {
            Genre::factory()->create(['type' => $genre])->each(
                function ($genre) {
                    $author = Author::factory()->create();
                    Song::factory(2)->create(['author_id' => $author->id])->each(
                        function ($song) use ($genre) {
                            $song->genres()->attach($genre->id);
                        }
                    );
                }
            );
        }

        //Genre::factory(3)->create();
        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}