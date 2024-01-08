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
        DataOutdor::create([
            'suhu_out' => 25.5,
            'kelembaban_out' => 60.0,
            'hujan' => '0',
            'kond_cahaya' => '1',
            'intens_cahaya' => 800.0,
            'hari' => 'friday',
            'datetime' => now(),
        ]);

        DataOutdor::create([
            'suhu_out' => 28.0,
            'kelembaban_out' => 55.5,
            'hujan' => '1',
            'kond_cahaya' => '0',
            'intens_cahaya' => 400.0,
            'hari' => 'friday',
            'datetime' => now(),
        ]);

        // Tambahkan data seed lainnya sesuai kebutuhan
    }
}
