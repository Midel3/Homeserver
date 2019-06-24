<?php

namespace Homeserver;

use Illuminate\Database\Eloquent\Model;

class Gerecht extends Model  {

    protected $table = 'gerechts';
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
