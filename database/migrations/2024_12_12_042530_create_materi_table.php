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
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi');
            $table->foreignId('id_course')->constrained('course', 'id_course')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['materi', 'quiz', 'modul'])->default('materi');
            $table->string('name_materi');
            $table->string('video')->nullable();;
            $table->text('description');
            $table->string('text_book')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
