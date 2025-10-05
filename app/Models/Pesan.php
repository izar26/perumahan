<?php

// app/Models/Pesan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kontak',
        'subjek',
        'isi_pesan',
        'sudah_dibaca',
    ];
}