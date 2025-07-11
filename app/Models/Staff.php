<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'posisi',
        'rate_a',
        'rate_b',
        'rate_c',
    ];
}
