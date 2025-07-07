<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuisnessCycle extends Model
{
    protected $fillable = [
        'tipe_industri_id',
        'namaBisCyc',
    ];

    public function tipeIndustri()
    {
        return $this->belongsTo(TipeIndustri::class, 'tipe_industri_id', 'id');
    }

    public function co_objs()
    {
        return $this->hasMany(Co_Obj::class, 'bis_cyc_id', 'id');
    }
}
