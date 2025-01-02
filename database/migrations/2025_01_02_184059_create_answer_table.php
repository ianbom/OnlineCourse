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
        Schema::create('answer', function (Blueprint $table) {
            $table->id('id_answer');
            $table->foreignId('id_question')->constrained('question', 'id_question')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_option')->constrained('option', 'id_option')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer');
    }
};
