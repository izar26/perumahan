<?php

// app/Models/TipeUnit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tipe',
        'slug',
        'harga',
        'luas_tanah',
        'luas_bangunan',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'denah_path',
        'thumbnail_path',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}