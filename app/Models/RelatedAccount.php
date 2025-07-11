<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedAccount extends Model
{
    protected $fillable = [
        'kodeCO',
        'nama_akun',
        'asersi',
    ];

    public function co_obj()
    {
        return $this->belongsTo(Co_Obj::class, 'kodeCO', 'kodeCO');
    }
}
