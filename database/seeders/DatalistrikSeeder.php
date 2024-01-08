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
        Datalistrik::create([
            'tegangan_1' => 220.0,
            'arus_1' => 5.0,
            'daya_1' => 1100.0,
            'tegangan_2' => 220.0,
            'arus_2' => 6.0,
            'daya_2' => 1320.0,
            'tegangan_3' => 220.0,
            'arus_3' => 7.0,
            'daya_3' => 1540.0,
            'daya_total' => 3960.0,
            'sisa_daya' => 40.0,
            'hari' => 'Monday',
            'datetime' => now(),
        ]);

        Datalistrik::create([
            'tegangan_1' => 220.0,
            'arus_1' => 6.0,
            'daya_1' => 1320.0,
            'tegangan_2' => 220.0,
            'arus_2' => 7.0,
            'daya_2' => 1540.0,
            'tegangan_3' => 220.0,
            'arus_3' => 8.0,
            'daya_3' => 1760.0,
            'daya_total' => 4620.0,
            'sisa_daya' => 20.0,
            'hari' => 'Tuesday',
            'datetime' => now(),
        ]);
    }
}
