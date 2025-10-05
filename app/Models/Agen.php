<?php

// app/Models/Agen.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_agen',
        'jabatan',
        'nomor_wa',
        'foto_path',
    ];
}