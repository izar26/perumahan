<?php
// app/Models/Photo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_unit_id',
        'path',
    ];

    public function tipeUnit(): BelongsTo
    {
        return $this->belongsTo(TipeUnit::class);
    }
}
