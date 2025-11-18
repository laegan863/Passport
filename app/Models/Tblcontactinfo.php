<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblcontactinfo extends Model
{
    protected $fillable = [
        'order_id',
        'primary_phone',
        'phone_type',
        'additional_numbers',
        'address_line1',
        'address_unit',
        'address_line2',
        'state',
        'city',
        'zip',
        'same_mailing',
        'mail_address_line1',
        'mail_address_unit',
        'mail_address_line2',
        'mail_state',
        'mail_city',
        'mail_zip',
    ];

    protected $casts = [
        'additional_numbers' => 'array',
        'same_mailing' => 'boolean',
    ];

    public function tblpersonalinfos()
    {
        return $this->belongsTo(Tblpersonalinfo::class, 'order_id', 'id');
    }
}
