<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{

    protected $fillable = [
        'kodeCA',
        'risk',
    ];

    public function co_act()
    {
        return $this->belongsTo(Co_Act::class, 'kodeCA', 'id');
    }

}
