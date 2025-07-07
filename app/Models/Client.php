<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'tipe_industri_id',
        'nama',
        'code_client',
    ];

    public function tipeIndustri()
    {
        return $this->belongsTo(TipeIndustri::class, 'tipe_industri_id', 'id');
    }

    /**
     * belum ada model + migration
     */
    // public function engagement()
    // {
    //     return $this->hasMany();
    // }
}
