<?php

use Faker\Generator as Faker;

$factory->define(Homeserver\Gerecht::class, function (Faker $faker) {
    return [
        'naam' => substr($faker->sentence(2), 0, -1),
        'omschrijving' => $faker->sentence(10),
        'vlees' => $faker->randomElement(['Rund', 'Varken', 'Kip', 'Vis', 'Vegetarisch']),
        'type' => $faker->randomElement(['Pasta', 'Rijst', 'Aardappel', 'Salade', 'Anders'])
    ];
});
