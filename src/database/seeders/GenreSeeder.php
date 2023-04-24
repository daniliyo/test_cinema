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
        $genres = [
            'action', 
            'adventure', 
            'comedy', 
            'drama', 
            'fantasy', 
            'horror', 
            'musicals', 
            'mystery', 
            'romance', 
            'science fiction', 
            'sports', 
            'thriller', 
            'Western'
        ];
        foreach($genres as $genre){
            Genre::create(['name' => $genre]);
        }
    }
}
