<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('section_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('section_key', 80)->index();
            $table->unsignedTinyInteger('rating'); // 1..5
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();

            // 1 calificación por usuario por sección (se puede actualizar)
            $table->unique(['section_key', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_ratings');
    }
};
