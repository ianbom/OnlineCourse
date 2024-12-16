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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->foreignId('id_bundle')->constrained('bundle', 'id_bundle')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_bundle');
            $table->decimal('price_total', 15, 0);
            $table->enum('status_order', ['pending', 'cancelled', 'success']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
