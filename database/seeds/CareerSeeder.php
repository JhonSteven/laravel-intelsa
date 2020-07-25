<?php

use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::insert([
            ['career' => 'Ingeniería del Software'],
            ['career' => 'Ingeniería Mecánica'],
            ['career' => 'Ingeniería Industrial'],
            ['career' => 'Ingeniería Civil'],
            ['career' => 'Economía'],
            ['career' => 'Derecho'],
            ['career' => 'Biología'],
            ['career' => 'Química'],
            ['career' => 'Trabajo Social'],
            ['career' => 'Psicología'],
            ['career' => 'Ciencias Políticas'],
        ]); 
    }
}
