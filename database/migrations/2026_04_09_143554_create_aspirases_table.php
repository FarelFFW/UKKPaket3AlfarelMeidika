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
        Schema::create('aspirases', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['menunggu', 'proses', 'selesai'])->default('menunggu');
            $table->foreignId('input_aspirasi_id')->constrained('input_aspirases')->onDelete('cascade');
            $table->string('lokasi', 255);
            $table->string('feedback', 255);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirases');
    }
};
