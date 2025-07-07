<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Co_Act extends Model
{

    protected $fillable = [
        'co_obj_id',
        'codeCA',
        'control_act',
    ];

    public function co_obj()
    {
        return $this->belongsTo(Co_Obj::class, 'co_obj_id', 'id');
    }

    public function risks()
    {
        return $this->hasMany(Risk::class, 'co_act_id', 'id');
    }
}
