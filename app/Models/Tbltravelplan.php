<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbltravelplan extends Model
{
     protected $fillable = [
        'order_id',
        'has_travel_plans',
        'departure_date',
        'return_date',
        'travel_country',
    ];

    protected $casts = [
        'has_travel_plans' => 'boolean',
        'travel_country' => 'array',
    ];

    public function tblpersonalinfos()
    {
        return $this->belongsTo(Tblpersonalinfo::class, 'order_id', 'id');
    }
}
