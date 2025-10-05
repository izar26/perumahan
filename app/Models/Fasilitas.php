<?php

// app/Models/Fasilitas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    // Ganti nama tabel default 'fasilitas' menjadi 'fasilitas' jika Laravel salah mendeteksi
    protected $table = 'fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'icon_path',
    ];
}