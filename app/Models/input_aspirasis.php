<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class input_aspirasis extends Model
{
    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'lokasi',
        'keterangan',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(siswas::class, 'siswa_id', 'nis');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategoris::class, 'kategori_id');
    }

    public function aspirasis(): HasMany
    {
        return $this->hasMany(aspirasis::class, 'input_aspirasi_id');
    }
}
