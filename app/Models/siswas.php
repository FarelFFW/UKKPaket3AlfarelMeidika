<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'nis';

    protected $fillable = [
        'kelas',
    ];
}
