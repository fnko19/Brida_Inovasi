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
        Schema::create('indikator5s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi5_id'); 
            $table->string('nama5_inovasi');
            $table->enum('parameter5', ['Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain', 'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)', 'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)',]);
            $table->integer('bobot5')->nullable();
            $table->timestamps();

            $table->foreign('inovasi5_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator5s');
    }
};
