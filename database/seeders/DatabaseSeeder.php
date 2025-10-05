<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\Agen;
use App\Models\Fasilitas;
use App\Models\TipeUnit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 1 user admin default
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Memanggil factory untuk membuat data dummy
        TipeUnit::factory(5)->create();   // Buat 5 data Tipe Unit
        Fasilitas::factory(8)->create(); // Buat 8 data Fasilitas
        Agen::factory(3)->create();      // Buat 3 data Agen
    }
}