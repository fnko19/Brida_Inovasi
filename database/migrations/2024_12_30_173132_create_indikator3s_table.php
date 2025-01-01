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
        Schema::create('indikator3s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi3_id'); 
            $table->string('nama3_inovasi');
            $table->enum('parameter3', ['Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)', 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2', 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3',]);
            $table->integer('bobot3')->nullable();
            $table->timestamps();

            $table->foreign('inovasi3_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator3s');
    }
};
