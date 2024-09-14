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
        Schema::create('form_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('form_data')->nullable(); // Store form data as JSON
            $table->text('summary'); // Field for the summary
            $table->text('image')->nullable(); // Field for base64 image, nullable
            $table->json('languages')->nullable(); // Field for storing languages as JSON
            $table->json('skills')->nullable(); // Field for storing skills as JSON
            $table->integer('current_step')->default(1); // Track the current step
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_steps');
    }
};
