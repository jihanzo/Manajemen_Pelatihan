<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        'lokasi',
        'materi',
        'pemateri'
    ];

    public function pelatihan(): HasMany
    {
        return $this->hasMany(Pelatihan::class);
    }
}
