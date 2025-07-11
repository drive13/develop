<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Co_Obj extends Model
{

    protected $fillable = [
        'kodeBisCyc',
        'kodeCO',
        'control_obj',
        'description',
    ];

    public function bisCyc()
    {
        return $this->belongsTo(BuisnessCycle::class, 'kodeBisCyc', 'kodeBisCyc');
    }

    public function co_acts()
    {
        return $this->hasMany(Co_Act::class, 'kodeCO', 'kodeCO');
    }
}
