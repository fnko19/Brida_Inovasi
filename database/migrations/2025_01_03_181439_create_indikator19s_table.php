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
        Schema::create('indikator19s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi19_id'); 
            $table->string('nama19_inovasi');
            $table->enum('parameter19', ['Hasil inovasi monev internal perangkat daerah', 'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat', 'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis',]);
            $table->integer('bobot19')->nullable();
            $table->timestamps();

            $table->foreign('inovasi19_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator19s');
    }
};
