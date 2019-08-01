<?php

namespace Homeserver;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gerecht
 * @package Homeserver
 * @property integer $id
 * @property string $naam
 * @property string $ingredienten
 * @property string $starch
 * @property string $vlees
 */
class Gerecht extends Model  {

    protected $table = 'dishes';
    protected $primaryKey = 'id';

    const ALL_MEATS = [
        'Rund',
        'Kip',
        'Varken',
        'Vis',
        'Vegetarisch',
    ];


    const ALL_STARCHES = [
        'Pasta',
        'Rijst',
        'Aardappel',
        'Salade',
        'Anders',
    ];

    protected $naam;
    protected $ingredienten;
    protected $starch;
    protected $vlees;


}
