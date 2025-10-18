<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comic_id' => Comic::factory(), // Create one if not existss
            'page_number' => $this->faker->unique()->numberBetween(1, 50),
            'filename' => fn (array $attrs) => "{$attrs['page_number']}.jpg",
        ];
    }
}
