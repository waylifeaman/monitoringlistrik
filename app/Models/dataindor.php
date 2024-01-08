<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataindor extends Model
{
    use HasFactory;
    protected $fillable = ['suhu_ind', 'kelembaban_ind', 'hari', 'datetime'];
}
