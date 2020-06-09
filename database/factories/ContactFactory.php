<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\Client;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
		'fullname' => $faker->name(),
		'poste' => $faker->jobTitle(),
	    'telephone' => $faker->numberBetween($min = "0111111111", $max = "0799999999"),
	    'email' => $faker->email(),
		'clients_id' => App\Client::inRandomOrder()->value('id'),
    ];
});