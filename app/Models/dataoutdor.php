<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataoutdor extends Model
{
    use HasFactory;
    protected $table = 'dataoutdors';
    protected $fillable = ['suhu_out', 'kelembaban_out', 'hujan', 'kond_cahaya', 'intens_cahaya', 'hari', 'datetime'];

    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function scopesuhuIndor($userId = null)
    {
        $userId = $userId ?? auth()->user()->userId;
    }
    public function dataangin()
    {
        return $this->hasOne(dataangin::class, 'angin_id', 'id');
    }
}
