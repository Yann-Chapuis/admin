<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'enseigne' => $faker->company(),
        'note' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'telephone' => $faker->numberBetween($min = "0111111111", $max = "0799999999"),
        'email' => $faker->email(),
        'ville' => $faker->city(),
        'cp' => $faker->numberBetween($min = "13000", $max = "98890"),
        'etat' => $faker->boolean(),
        'picture' => ('default_logo.png'),
    ];
});
