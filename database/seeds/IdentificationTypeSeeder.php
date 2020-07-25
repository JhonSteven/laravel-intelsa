<?php

use Illuminate\Database\Seeder;
use App\Models\IdentificationType;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdentificationType::insert([
            ['identification_type' => 'Cédula'],
            ['identification_type' => 'Tarjeta de identidad'],
            ['identification_type' => 'Registro civil'],
            ['identification_type' => 'Pasaporte'],
        ]);
    }
}
