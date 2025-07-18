<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadsheet extends Model
{
    protected $fillable = [
        // 'klien', --> belum ada model
        // 'kodewp', --> belum ada model
        'kodeLeadsheet',
        'kodeBisCyc', // header 1 // eg. MC
        'kodeCO', //header 2 // eg. MC01
        'kodeCA', //--> yg perlu di loop // eg MC0101
        'desain',
        'test',
        'issue',
    ];

    public function ucas()
    {
        return $this->hasMany(UnderstandingCA::class, 'kodeLeadsheet', 'kodeLeadsheet');
    }
}
