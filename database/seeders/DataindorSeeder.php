<?php

namespace Database\Seeders;

use App\Models\dataindor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataindorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('H:i:s j-n-Y');
        $day = date('l');
        dataindor::create(
            [
                'suhu_ind' => '52',
                'kelembaban_ind' => '63',
                'hari' => $day,
                'datetime' => $tgl
            ],

        );
    }
}
