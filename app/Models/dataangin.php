<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataangin extends Model
{
    use HasFactory;
    protected $table = 'dataangins'; // Sesuaikan dengan nama tabel sesuai yang Anda gunakan

    protected $fillable = [
        'kec_angin',
        'hari',
        'datetime',
    ];
}
