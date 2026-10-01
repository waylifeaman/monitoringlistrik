<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DataanginSeeder::class,
            DataindorSeeder::class,
            DatalistrikSeeder::class,
            DataoutdorSeeder::class,
            ProfilControllerSeeder::class,
        ]);
    }
}
