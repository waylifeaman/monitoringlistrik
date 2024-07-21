<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataindor extends Model
{
    protected $table = 'dataindors';
    protected $fillable = ['suhu_ind', 'kelembaban_ind', 'hari', 'datetime'];

    // protected $guarded = [];

    // public function createdBy()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }
    // public function scopesuhuIndor($userId = null)
    // {
    //     $userId = $userId ?? auth()->user()->userId;
    // }
}
