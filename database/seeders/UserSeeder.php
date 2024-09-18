<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Darna Nusi',
            'username' => 'admin123',
            'level' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Penghuni',
            'username' => 'penghuni123',
            'level' => 'penghuni',
            'password' => Hash::make('password'),
        ]);
    }
}
