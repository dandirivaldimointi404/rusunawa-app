<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    // use HasFactory;
    protected $table = 'tagihan';

    protected $fillable = [
        'penghuni_id',
        'status',
        'total_tagihan',
        'tgl_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}
