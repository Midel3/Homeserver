<?php

use Faker\Generator as Faker;
use Homeserver\Vlees as Vlees;
use Homeserver\Starch as Starch;


$factory->define(Homeserver\Gerecht::class, function (Faker $faker) {

    return [
        'naam' => substr($faker->sentence(2), 0, -1),
        'ingredienten' => $faker->sentence(10),
        'vlees' => $faker->randomElement(\Homeserver\Gerecht::ALL_MEATS),
        'starch' => $faker->randomElement(\Homeserver\Gerecht::ALL_STARCHES)
    ];
});
