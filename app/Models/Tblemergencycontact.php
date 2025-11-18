<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblemergencycontact extends Model
{
    protected $fillable = [
        'order_id',
        'relationship',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'phone_type',
        'address1',
        'address2',
        'apartment',
        'country',
        'zip',
        'city',
    ];

    public function tblpersonalinfos()
    {
        return $this->belongsTo(Tblpersonalinfo::class, 'order_id', 'id');
    }
}
