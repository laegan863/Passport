<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportContact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in-progress');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'new' => 'badge-primary',
            'in-progress' => 'badge-warning',
            'resolved' => 'badge-success',
            'closed' => 'badge-secondary',
            default => 'badge-secondary',
        };
    }
}
