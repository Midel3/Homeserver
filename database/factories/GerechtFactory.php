<?php

use Faker\Generator as Faker;
use Homeserver\Vlees as Vlees;
use Homeserver\Starch as Starch;


$factory->define(Homeserver\Gerecht::class, function (Faker $faker) {
    $vlees = \Homeserver\Vlees::all()->pluck('soort')->toArray();
    $starch = \Homeserver\Starch::all()->pluck('soort')->toArray();
    return [
        'naam' => substr($faker->sentence(2), 0, -1),
        'omschrijving' => $faker->sentence(10),
        'vlees' => $faker->randomElement($vlees),
        'starch' => $faker->randomElement($starch)
    ];
});
