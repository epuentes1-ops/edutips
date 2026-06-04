<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProcessingAcceptance extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'accepted',
        'policy_version',
        'accepted_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'accepted' => 'boolean',
        'accepted_at' => 'datetime',
    ];
}