<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{

    protected $table = 'penghuni';

    protected $fillable = [
        'user_id',
        'kamar_id',
        'nama_penghuni',
        'alamat',
        'no_wa_pribadi',
        'no_wa_ortu',
        'tgl_masuk',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    // public function createTagihan()
    // {
    //     $today = Carbon::now();
    //     $tglMasuk = Carbon::parse($this->tgl_masuk);

    //     $tglTagihan = Carbon::create($today->year, $today->month, $tglMasuk->day);

    //     if ($today->greaterThanOrEqualTo($tglTagihan)) {
    //         $existingTagihan = Tagihan::where('penghuni_id', $this->id)
    //             ->whereMonth('created_at', $today->month)
    //             ->whereYear('created_at', $today->year)
    //             ->first();

    //         if (!$existingTagihan) {
    //             $tarifKamar = $this->kamar ? $this->kamar->tarif : 0;

    //             Tagihan::create([
    //                 'penghuni_id' => $this->id,
    //                 'status' => 'cicil',
    //                 'total_tagihan' => $tarifKamar,
    //                 'tgl_pembayaran' => null,
    //             ]);
    //         }
    //     }
    // }

    public function createTagihan()
    {
        $today = Carbon::now();
        $tglMasuk = Carbon::parse($this->tgl_masuk);

        $tglTagihan = $tglMasuk->copy()->addMonth();

        if ($tglTagihan->day > $tglTagihan->copy()->endOfMonth()->day) {
            $tglTagihan = $tglTagihan->copy()->endOfMonth();
        } else {
            $tglTagihan = $tglTagihan->copy()->day($tglMasuk->day);
        }

        if ($today->greaterThanOrEqualTo($tglTagihan)) {
            $existingTagihan = Tagihan::where('penghuni_id', $this->id)
                ->whereMonth('created_at', $today->month)
                ->whereYear('created_at', $today->year)
                ->first();

            if (!$existingTagihan) {
                $tarifKamar = $this->kamar ? $this->kamar->tarif : 0;

                Tagihan::create([
                    'penghuni_id' => $this->id,
                    'status' => 'cicil',
                    'total_tagihan' => $tarifKamar,
                    'tgl_pembayaran' => null,
                ]);
            }
        }
    }
}
