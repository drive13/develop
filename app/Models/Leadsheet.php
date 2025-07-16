<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadsheet extends Model
{
    protected $fillable = [
        'kodeLeadsheet',
        'kodeBisCyc',
        'kodeCO',
        'kodeCA',
        'desain',
        'test',
        'issue',
    ];

    public function ucas()
    {
        return $this->hasMany(UnderstandingCA::class, 'kodeLeadsheet', 'kodeLeadsheet');
    }
}
