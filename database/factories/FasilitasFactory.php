<?php

// database/factories/FasilitasFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FasilitasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_fasilitas' => fake()->words(2, true),
            'icon_path' => 'icons/placeholder.svg', // Asumsi ada ikon contoh
        ];
    }
} 
