<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Co_Act extends Model
{

    protected $fillable = [
        'kodeCO',
        'kodeCA',
        'control_act',
        'description',
        'test_of_control',
        'nature',
    ];

    public function co_obj()
    {
        return $this->belongsTo(Co_Obj::class, 'kodeCO', 'kodeCO');
    }

    public function risks()
    {
        return $this->hasMany(Risk::class, 'kodeCA', 'kodeCA');
    }
}
