<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tambahkan user admin bawaan
        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // password: password
            'role' => 'admin',
        ]);

        // Tambahkan contoh user guru
        User::create([
            'username' => 'guru_matematika',
            'name' => 'guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        // Tambahkan contoh user siswa
        User::create([
            'username' => 'siswa_1',
            'name' => 'siswa',
            'email' => 'siswa1@example.com',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
        ]);
    }
}
