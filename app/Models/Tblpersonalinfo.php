<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tblpersonalinfo extends Model
{
    protected $fillable = [
        'application_type',
        'first_name',
        'middle_name',
        'last_name',
        'name_status',
        'previous_names',
        'birth_month',
        'birth_day',
        'birth_year',
        'gender',
        'birth_country',
        'birth_state',
        'birth_city',
        'height_ft',
        'height_in',
        'hair_color',
        'eye_color',
        'employment_status',
        'email',
        'status',
    ];

    protected $casts = [
        'previous_names' => 'array',
    ];

    /**
     * Get the contact information for this application
     */
    public function contactInfo()
    {
        return $this->hasOne(Tblcontactinfo::class, 'order_id');
    }

    /**
     * Get the passport details for this application
     */
    public function passportDetail()
    {
        return $this->hasOne(Tblpassportdetail::class, 'order_id');
    }

    /**
     * Get the emergency contact for this application
     */
    public function emergencyContact()
    {
        return $this->hasOne(Tblemergencycontact::class, 'order_id');
    }

    /**
     * Get the travel plan for this application
     */
    public function travelPlan()
    {
        return $this->hasOne(Tbltravelplan::class, 'order_id');
    }

    /**
     * Get the verification for this application
     */
    public function verification()
    {
        return $this->hasOne(Tblverification::class, 'order_id');
    }

    /**
     * Get the family info for this application
     */
    public function familyInfo()
    {
        return $this->hasOne(\App\Models\FamilyInfo::class, 'user_id');
    }
}
