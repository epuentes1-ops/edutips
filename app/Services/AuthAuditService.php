<?php

namespace App\Services;

use App\Models\LoginAuditLog;
use App\Models\User;
use Illuminate\Http\Request;

class AuthAuditService
{
    public static function log(
        string $eventType,
        Request $request,
        ?User $user = null,
        ?string $email = null,
        bool $success = true,
        ?string $failureReason = null,
        array $metadata = [],
        string $authProvider = 'local'
    ): void {
        LoginAuditLog::create([
            'user_id' => $user?->id,
            'email' => $email ?? $user?->email,
            'auth_provider' => $authProvider,
            'event_type' => $eventType,
            'success' => $success,
            'failure_reason' => $failureReason,
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
            'metadata' => $metadata,
            'event_at' => now(),
        ]);
    }
}