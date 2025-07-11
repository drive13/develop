<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'kodeIndustri',
        'code_client',
        'nama',
        'alamat',
        'initial_year',
        'current_year',
    ];

    public function tipeIndustri()
    {
        return $this->belongsTo(TipeIndustri::class, 'kodeIndustri', 'kodeIndustri');
    }

    /**
     * belum ada model + migration
     */
    // public function engagement()
    // {
    //     return $this->hasMany();
    // }
}
