<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblpassportdetail extends Model
{
    protected $fillable = [
        'order_id',
        'book_fullname',
        'book_number',
        'book_issue',
        'book_expiry',
        'book_name_change',
        'change_reason',
        'prev_name',
        'place_name_change',
        'date_name_change',
        
        'card_applied',
        'card_fullname',
        'card_number',
        'card_issue',
        'card_expiry',
        'card_status',
    ];

    protected $casts = [
        'prev_name' => 'array',
        'book_issue' => 'date',
        'book_expiry' => 'date',
        'date_name_change' => 'date',
        'card_issue' => 'date',
        'card_expiry' => 'date',
    ];

    public function tblpersonalinfos()
    {
        return $this->belongsTo(Tblpersonalinfo::class, 'order_id', 'id');
    }
}
