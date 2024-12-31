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
        Schema::create('content', function (Blueprint $table) {
            $table->id('id_content');
            $table->foreignId('id_course')->nullable()->constrained('course', 'id_course')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_content');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('content');
    }
};
