<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamar')->insert([
            [
                'nomor_kamar' => '101',
                'lantai' => 1,
                'kapasitas' => 2,
                'tarif' => 250000,
                'total_tarif' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_kamar' => '102',
                'lantai' => 1,
                'kapasitas' => 3,
                'tarif' => 300000,
                'total_tarif' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_kamar' => '201',
                'lantai' => 2,
                'kapasitas' => 2,
                'tarif' => 280000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_kamar' => '202',
                'lantai' => 2,
                'kapasitas' => 4,
                'tarif' => 350000,
                'total_tarif' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
