<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comic;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            GenreSeeder::class,
            // ComicSeeder::class,
        ]);
        
        User::factory()->has(
            Comic::factory()
            ->count(100)
            ->withGenres()
            ->withPages(10)
        )->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory(1)->create();

        
    }
}
