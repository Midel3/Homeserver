<?php

use Illuminate\Database\Seeder;

class VleesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vlees')->insert([
            'soort' => 'Rund'
        ]);
        DB::table('vlees')->insert([
            'soort' => 'Varken'
        ]);
        DB::table('vlees')->insert([
            'soort' => 'Kip'
        ]);
        DB::table('vlees')->insert([
            'soort' => 'Vis'
        ]);
        DB::table('vlees')->insert([
            'soort' => 'Vegetarisch'
        ]);
    }
}
