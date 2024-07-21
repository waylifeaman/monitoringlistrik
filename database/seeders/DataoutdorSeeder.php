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
        dataoutdor::create([
            'angin_id' => 2,
            'suhu_out' => 54,
            'kelembaban_out' => 23,
            'hujan' => 0,
            'kond_cahaya' => 0,
            'intens_cahaya' => 120,
            'hari' => 'Tuesday',
            'datetime' => now(),
        ]);

        // DataOutdor::create([
        //     'suhu_out' => 38.0,
        //     'kelembaban_out' => 55.5,
        //     'hujan' => '0',
        //     'kond_cahaya' => '0',
        //     'intens_cahaya' => 780.0,
        //     'hari' => 'Thuesday',
        //     'datetime' => now(),
        // ]);

        // Tambahkan data seed lainnya sesuai kebutuhan
    }
}
