<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class aspirasis extends Model
{
    protected $fillable = [
        'status',
        'input_aspirasi_id',
        'lokasi',
        'feedback',
    ];

    public function inputAspirasi(): BelongsTo
    {
        return $this->belongsTo(input_aspirasis::class, 'input_aspirasi_id');
    }
}
