<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            ['genre' => 'Masculino'],
            ['genre' => 'Femenino'],
            ['genre' => 'Otro'],
        ]);        
    }
}
