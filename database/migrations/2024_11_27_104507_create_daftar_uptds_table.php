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
        Schema::create('daftar_uptds', function (Blueprint $table) {
            $table->id();
            $table->string('nama_uptd');
            $table->foreignId('daftar_opd_id') 
                ->constrained('daftar_opds') 
                ->onDelete('cascade'); 
            $table->string('daerah')->default('Kota Makassar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_uptds');
    }
};
