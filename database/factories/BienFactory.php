<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bien;
use Faker\Generator as Faker;

$factory->define(Bien::class, function (Faker $faker) {
    return [
        'titre_bien' => $faker->catchPhrase,
        'descr_bien' => $faker->paragraph(1),
        'image_bien' => $faker->imageUrl(500,500),
        'superficie_bien' => $faker->numberBetween(10, 5000),
        'nbr_piece_bien' => $faker->randomDigit,
        'dependance_bien' => $faker->boolean,
        'prix_bien' => $faker->numberBetween(500, 1000000),
        'frais_agence_bien' => $faker->numberBetween(250, 25000),
        'id_vendeur' => $faker->randomNumber(2),
    ];
});
