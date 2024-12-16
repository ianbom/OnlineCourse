<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function down(): void
    {
        Schema::create('text_book', function (Blueprint $table) {
            $table->id('id_text_book');
            $table->foreignId('id_materi')->constrained('materi', 'id_materi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_text_book');
            $table->string('file');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('text_book');
    }
};
