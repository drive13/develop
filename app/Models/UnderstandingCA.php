<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnderstandingCA extends Model
{
    protected $fillable = [
        'kodeLeadsheet',
        'kodeCA',
        'kodeActivityCA',
        'activityCA',
        'sop',
        'dijalankan',
        'penjelasanActivity',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function ls()
    {
        return $this->belongsTo(Leadsheet::class,'kodeLeadsheet', 'kodeLeadsheet');
    }
}
