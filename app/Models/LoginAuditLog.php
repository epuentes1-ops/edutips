<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAuditLog extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'auth_provider',
        'event_type',
        'success',
        'failure_reason',
        'ip_address',
        'user_agent',
        'metadata',
        'event_at',
    ];

    protected $casts = [
        'success' => 'boolean',
        'metadata' => 'array',
        'event_at' => 'datetime',
    ];
}