<?php

use Illuminate\Database\Seeder;

class StarchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('starches')->insert([
            'soort' => 'Pasta'
        ]);
        DB::table('starches')->insert([
            'soort' => 'Rijst'
        ]);
        DB::table('starches')->insert([
            'soort' => 'Aardappel'
        ]);
        DB::table('starches')->insert([
            'soort' => 'Salade'
        ]);
        DB::table('starches')->insert([
            'soort' => 'Anders'
        ]);

    }
}
