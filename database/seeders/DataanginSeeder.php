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
        Dataangin::create([
            'kec_angin' => 15.0,
            'hari' => 'sunday',
            'datetime' => now(),
        ]);

        Dataangin::create([
            'kec_angin' => 18.5,
            'hari' => 'monday',
            'datetime' => now(),
        ]);

        // Tambahkan data seed lainnya sesuai kebutuhan
    }
}
