<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
