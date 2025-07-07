<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Co_Obj extends Model
{

    protected $fillable = [
        'bis_cyc_id',
        'codeCO',
        'control_obj',
        'asersi1',
        'asersi2',
        'asersi3',
        'asersi4',
    ];

    public function bisCyc()
    {
        return $this->belongsTo(BuisnessCycle::class, 'bis_cyc_id', 'id');
    }

    public function co_acts()
    {
        return $this->hasMany(Co_Act::class, 'co_obj_id', 'id');
    }
}
