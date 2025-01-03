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
        Schema::create('indikator13s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi13_id'); 
            $table->string('nama13_inovasi');
            $table->enum('parameter13', ['Hasil inovasi diperoleh dalam waktu 6 hari atau lebih', 'Hasil inovasi diperoleh dalam waktu 2-5 hari', 'Hasil inovasi diperoleh dalam waktu 1 hari',]);
            $table->integer('bobot13')->nullable();
            $table->timestamps();

            $table->foreign('inovasi13_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator13s');
    }
};
