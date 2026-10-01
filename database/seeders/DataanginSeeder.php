<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dataangin;

class DataanginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data seed, Anda dapat menyesuaikan dengan kebutuhan Anda
        // dataangin::create([
        //     'kec_angin' => 15.0,
        //     'hari' => 'sunday',
        //     'datetime' => now(),
        // ]);
        for ($i = 1; $i <= 100; $i++) {
            dataangin::create([
                'kec_angin' => rand(0, 100), // Generate random wind speed between 0 and 100
                'hari' => date('l'), // Get the current day of the week
                'datetime' => now(), // Get the current date and time
            ]);
        }

        // Tambahkan data seed lainnya sesuai kebutuhan
    }
}
