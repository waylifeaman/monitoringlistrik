<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datalistrik extends Model
{
    use HasFactory;
    protected $table = 'datalistriks'; // Sesuaikan dengan nama tabel sesuai yang Anda gunakan

    protected $fillable = [
        'tegangan_1',
        'arus_1',
        'daya_1',
        'tegangan_2',
        'arus_2',
        'daya_2',
        'tegangan_3',
        'arus_3',
        'daya_3',
        'daya_total',
        'sisa_daya',
        'hari',
        'datetime',
    ];
}
