<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('address')->nullable();
            $table->string('city');
            $table->string('phone', 20)->nullable();
            $table->string('opening_hours', 100)->nullable();
            $table->string('price_range', 100)->nullable();
            $table->text('specialties')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['pending', 'published', 'rejected'])->default('pending');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index(['city', 'status']);
            $table->index(['category_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
