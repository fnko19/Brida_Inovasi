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
        Schema::create('laporan_diklats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('instansi');
            $table->enum('jenis_pelatihan', ['1', '2', '3', '4','5','6','7','8',]); 
            $table->string('judul_pelatihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_diklats');
    }
};
