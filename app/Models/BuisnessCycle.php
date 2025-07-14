<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuisnessCycle extends Model
{
    protected $fillable = [
        'kodeIndustri',
        'kodeBisCyc',
        'namaBisCyc',
    ];

    public function tipeIndustri()
    {
        return $this->belongsTo(TipeIndustri::class, 'kodeIndustri', 'kodeIndustri');
    }

    public function co_objs()
    {
        return $this->hasMany(Co_Obj::class, 'kodeBisCyc', 'kodeBisCyc');
    }
}
