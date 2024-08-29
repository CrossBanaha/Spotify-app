<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Song::class;
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->words(5,true),
            'premiere' => $this->faker->date(),
            'duration' => $this->faker->time('H:i:s', '00:10:00'),
            
        ];
    }
}