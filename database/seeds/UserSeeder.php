<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jhon Stiven Parra',
            'email' => 'demo@demo.com',
            'password' => bcrypt('demo12345'),
        ]);
    }
}
