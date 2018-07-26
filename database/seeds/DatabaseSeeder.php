<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VleesTableSeeder::class);
        $this->call(StarchesTableSeeder::class);
        $this->call(GerechtsTableSeeder::class);
    }
}
