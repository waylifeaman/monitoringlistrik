<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataOutdor;

class DataoutdorSeeder extends Seeder
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
            Dataoutdor::create([
                'angin_id' => rand(1, 10), // Generate random angin_id between 1 and 10
                'suhu_out' => rand(0, 100), // Generate random temperature between 0 and 100
                'kelembaban_out' => rand(0, 100), // Generate random humidity between 0 and 100
                'hujan' => rand(0, 1), // Generate random rain value (0 or 1)
                'kond_cahaya' => rand(0, 1), // Generate random light condition (0 or 1)
                'intens_cahaya' => rand(0, 100), // Generate random light intensity between 0 and 100
                'hari' => date('l'), // Get the current day of the week
                'datetime' => now(), // Get the current date and time
            ]);
        }
    }
}
