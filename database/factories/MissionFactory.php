<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mission;
use App\Client;
use Faker\Generator as Faker;

$factory->define(Mission::class, function (Faker $faker) {

	$endingDate   = $faker->date('Y-m-d', 'now');
	$startingDate = $faker->date('Y-m-d', $endingDate);

	$endingDateTime = new DateTime($endingDate);
	$startingDateTime = new DateTime($startingDate);

		
	$days = $startingDateTime->diff($endingDateTime);

	$CntDays = $days->format('%R%a');

    return [
		'titre' => $faker->company(),
		'descriptif' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'start_date' => $startingDateTime,
		'end_date' => $endingDateTime,
		'ct_days' => $CntDays,
		'etat' => $faker->randomElement($array = array ('0','1','2','3')), // 0 = bientôt - 1 = en cours - 2 = terminé - 3 = annulé
		'adr' => $faker->randomElement($array = array ('200','250','300', '350', '400', '450', '500')),
		'clients_id' => App\Client::inRandomOrder()->value('id'),
    ];
});
