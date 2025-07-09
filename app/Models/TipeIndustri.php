<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeIndustri extends Model
{

    protected $fillable = [
        'nama'
    ];

    public function bisCycs()
    {
        return $this->hasMany(BuisnessCycle::class, 'tipe_industri_id', 'id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'tipe_industri_id', 'id');
    }
}
