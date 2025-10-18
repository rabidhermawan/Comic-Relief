<?php

namespace Database\Factories;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    

    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'path' => 'placeholder',
            'page_count' => 10
        ];
    }

    public function withPages(int $pageCount = 10){
        return $this->afterCreating(function (Comic $comic) use ($pageCount) {
            for ($i = 1; $i <= $pageCount; $i++) {
                $comic->pages()->create([
                    'page_number' => $i,
                    'filename' => "{$i}.jpg",
                ]);
            }

            $comic->update(['page_count' => $pageCount]);
        });
    }

    // Hardcode the genre to pick 1 to 3 genres randomly, list is on seeder
    public function withGenres()
    {
        return $this->afterCreating(function (Comic $comic) {
            $genres = Genre::inRandomOrder()
                ->take(rand(1, 3))
                ->pluck('id');

        $comic->genres()->syncWithoutDetaching($genres);
    });
}
}