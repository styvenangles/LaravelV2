<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agence;
use Faker\Generator as Faker;

$factory->define(Agence::class, function (Faker $faker) {
    return [
        'nom_agence' => $faker->catchPhrase,
        'email_agence' => $faker->companyEmail,
        'tel_agence' => $faker->e164PhoneNumber,
        'nbr_agent_agence' => $faker->numberBetween(5, 30),
    ];
});
