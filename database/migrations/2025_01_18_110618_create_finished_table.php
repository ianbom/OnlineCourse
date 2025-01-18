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
        Schema::create('finished', function (Blueprint $table) {
            $table->id('id_finished');
            $table->foreignId('id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_course')->nullable()->constrained('course', 'id_course')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_materi')->nullable()->constrained('materi', 'id_materi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finished');
    }
};
