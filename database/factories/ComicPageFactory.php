<?php

namespace Database\Factories;

use App\Models\Comic;
use App\Models\ComicPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComicPage>
 */
class ComicPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comic_id' => Comic::factory(), // Create one if not exists
            'page_number' => $this->faker->unique()->numberBetween(1, 50),
            'file_name' => fn (array $attrs) => "{$attrs['page_number']}.jpg",
        ];
    }
}
