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
        Schema::create('apartemens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_apartemen');
            $table->integer('lantai_apartemen');
            $table->enum('status', ['available', 'occupied']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartemens');
    }
};
