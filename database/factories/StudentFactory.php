<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Career;
use App\Models\Student;
use App\Models\Genre;
use App\Models\IdentificationType;

$factory->define(Student::class, function (Faker $faker) {
    return [
        "names" => $faker->firstName,
        "surnames" => $faker->lastName,
        "identification_number" => $faker->isbn10,
        "date_of_birth" => $faker->dateTimeThisCentury->format('Y-m-d'),
        "identification_type_id" => IdentificationType::all()->random()->id,
        "genre_id" => Genre::all()->random()->id,
        "career_id" => Career::all()->random()->id,	
    ];
});
