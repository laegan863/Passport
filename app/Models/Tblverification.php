<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblverification extends Model
{
    protected $fillable = [
        'order_id',
        'security_question',
        'answer',
        'ssn_encrypted',
        'ssn_repeat_encrypted',
        'consent_agreed',
        'terms_agreed',
    ];

    public function tblpersonalinfos()
    {
        return $this->belongsTo(Tblpersonalinfo::class, 'order_id', 'id');
    }
}
