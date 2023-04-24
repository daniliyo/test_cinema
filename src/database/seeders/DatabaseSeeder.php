<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
        ]);

        Movie::factory(25)->create()
            ->each(function($movie){
                $movie->genres()->attach([rand(1,7), rand(8,13)]);
            });
    }
}
