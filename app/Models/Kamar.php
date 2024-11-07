<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'lantai',
        'kapasitas',
        'tarif',
        'total_tarif',
    ];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }

    public function penghuniCount()
    {
        return $this->penghuni()->count();
    }
}
