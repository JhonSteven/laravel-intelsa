<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            IdentificationTypeSeeder::class,
            CareerSeeder::class,
            StudentSeeder::class
        ]);

        //Seeder for Passport keys
        Artisan::call('passport:client --name=demo --no-interaction --personal');
    }
}
