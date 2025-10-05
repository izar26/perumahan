<?php

// database/factories/TipeUnitFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipeUnitFactory extends Factory
{
    public function definition(): array
    {
        $namaTipe = 'Tipe ' . fake()->unique()->word();
        return [
            'nama_tipe' => $namaTipe,
            'slug' => Str::slug($namaTipe),
            'harga' => fake()->numberBetween(500, 2000) * 1000000, // Harga antara 500jt - 2M
            'luas_tanah' => fake()->numberBetween(60, 120),
            'luas_bangunan' => fake()->numberBetween(45, 90),
            'deskripsi_singkat' => fake()->sentence(15),
            'deskripsi_lengkap' => fake()->paragraph(5),
            'thumbnail_path' => 'thumbnails/placeholder.jpg', // Asumsi ada gambar contoh
            'denah_path' => 'denahs/placeholder.jpg', // Asumsi ada gambar contoh
        ];
    }
}