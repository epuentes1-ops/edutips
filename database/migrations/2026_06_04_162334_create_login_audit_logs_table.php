<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_audit_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('email')->nullable();

            $table->string('auth_provider')->default('local');

            $table->enum('event_type', [
                'login_attempt',
                'login_success',
                'login_failed',
                'logout',
                'data_policy_accepted',
                'data_policy_rejected',
            ]);

            $table->boolean('success')->default(false);

            $table->text('failure_reason')->nullable();

            $table->ipAddress('ip_address')->nullable();

            $table->text('user_agent')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamp('event_at')->useCurrent();

            $table->timestamps();

            $table->index('user_id');
            $table->index('email');
            $table->index('event_type');
            $table->index('auth_provider');
            $table->index('event_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_audit_logs');
    }
};