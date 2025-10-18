<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Action', 'Adventure', 'Superhero', 'Mystery', 'Comedy', 'Slice of Life'];

        foreach ($genres as $genre){
            Genre::firstOrCreate(['genre' => $genre]);
        }
    }
}
