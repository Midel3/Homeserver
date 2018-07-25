<?php

use Illuminate\Database\Seeder;

class GerechtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //5 is het aantal objecten
        factory(Homeserver\Gerecht::class, 5)->create();
    }
}
