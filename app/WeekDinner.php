<?php

namespace Homeserver;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class WeekDinner
 * @package Homeserver
 * @property string $id
 * @property string $year
 * @property string $week
 * @property string $day
 * @property integer $dish_id
 */
class WeekDinner extends Model  {

    protected $table = 'week_dishes';
    protected $primaryKey = 'id';

    protected $year;
    protected $week;
    protected $day;
    protected $dish_id;

    protected $fillable = [
        'year',
        'week',
        'day',
        'dish_id'
    ];

    const ALL_YEARS = ['2019', '2020'];
    const DAYS_OF_WEEK = [
        'vrijdag',
        'zaterdag',
        'zondag',
        'maandag',
        'dinsdag',
        'woensdag',
        'donderdag'
    ];

    public function gerecht() {
        return $this->belongsTo(Gerecht::class, 'dish_id');
    }
}