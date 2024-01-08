<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataoutdor extends Model
{
    use HasFactory;
    protected $table = 'dataoutdors'; // Sesuaikan dengan nama tabel sesuai yang Anda gunakan

    protected $fillable = [
        'suhu_out',
        'kelembaban_out',
        'hujan',
        'kond_cahaya',
        'intens_cahaya',
        'hari',
        'datetime',
    ];
    protected $guarded = [];
}
