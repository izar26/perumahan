<?php

// database/factories/AgenFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_agen' => fake()->name(),
            'jabatan' => 'Marketing Executive',
            'nomor_wa' => '62812' . fake()->unique()->numerify('########'),
            'foto_path' => 'agens/placeholder.jpg', // Asumsi ada foto contoh
        ];
    }
}
