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
        Schema::create('note', function (Blueprint $table) {
            $table->id('id_note');
            $table->foreignId('id_materi')->constrained('materi', 'id_materi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_tables');
    }
};
