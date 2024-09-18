<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenghuniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->where('level', 'penghuni')->get();

        foreach ($users as $user) {
            DB::table('penghuni')->insert([
                [
                    'user_id' => $user->id,
                    'kamar_id' => 1,
                    'nama_penghuni' => $user->name,
                    'alamat' => 'Jl. Raya No. 123, Jakarta',
                    'no_wa_pribadi' => '081234567890',
                    'no_wa_ortu' => '089876543210',
                    'tgl_masuk' => Carbon::now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]);
        }
    }
}
