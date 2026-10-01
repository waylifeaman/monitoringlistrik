<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Datalistrik;


class DatalistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data seed, Anda dapat menyesuaikan dengan kebutuhan Anda
        for ($i = 1; $i <= 100; $i++) {
            Datalistrik::create([
                'tegangan_1' => rand(0, 100), // Generate random voltage between 0 and 100
                'arus_1' => rand(0, 100), // Generate random current between 0 and 100
                'daya_1' => rand(0, 100), // Generate random power between 0 and 100
                'tegangan_2' => rand(0, 100), // Generate random voltage between 0 and 100
                'arus_2' => rand(0, 100), // Generate random current between 0 and 100
                'daya_2' => rand(0, 100), // Generate random power between 0 and 100
                'tegangan_3' => rand(0, 100), // Generate random voltage between 0 and 100
                'arus_3' => rand(0, 100), // Generate random current between 0 and 100
                'daya_3' => rand(0, 100), // Generate random power between 0 and 100
                'daya_total' => rand(0, 300), // Generate random total power between 0 and 300
                'sisa_daya' => rand(0, 300), // Generate random remaining power between 0 and 300
                'hari' => date('l'), // Get the current day of the week
                'datetime' => now(), // Get the current date and time
            ]);
        }
    }
}
