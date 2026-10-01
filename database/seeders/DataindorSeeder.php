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

        for ($i = 1; $i <= 100; $i++) {
            dataindor::create([
                'suhu_ind' => rand(20, 40), // Generate random temperature between 20 and 40
                'kelembaban_ind' => rand(30, 70), // Generate random humidity between 30 and 70
                'hari' => date('l'), // Get the current day of the week
                'datetime' => now(), // Get the current date and time
            ]);
        }
       
    }
}
