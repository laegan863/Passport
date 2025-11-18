<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyInfo extends Model
{
    protected $table = 'family_infos';

    protected $fillable = [
        'user_id',
        'marital_status',

        'mother_unknown',
        'mother_firstname',
        'mother_middlename',
        'mother_lastname',
        'mother_dob',
        'mother_us_citizen',
        'mother_country',
        'mother_city',

        'father_unknown',
        'father_firstname',
        'father_middlename',
        'father_lastname',
        'father_dob',
        'father_us_citizen',
        'father_country',
        'father_city',
    ];

    protected $casts = [
        'mother_unknown' => 'boolean',
        'father_unknown' => 'boolean',
        'mother_dob' => 'date',
        'father_dob' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
