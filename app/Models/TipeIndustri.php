<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeIndustri extends Model
{

    protected $fillable = [
        'nama',
        'kodeIndustri',
    ];

    public function bisCycs()
    {
        return $this->hasMany(BuisnessCycle::class, 'kodeIndustri', 'kodeIndustri');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'kodeIndustri', 'kodeIndustri');
    }
}
