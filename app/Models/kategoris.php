<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategoris extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ket_kategori',
    ];

    public function inputAspirasis(): HasMany
    {
        return $this->hasMany(input_aspirasis::class, 'kategori_id');
    }
}
