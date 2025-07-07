<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{

    protected $fillable = [
        'co_act_id',
        'risk',
    ];

    public function co_act()
    {
        return $this->belongsTo(Co_Act::class, 'co_act_id', 'id');
    }

}
