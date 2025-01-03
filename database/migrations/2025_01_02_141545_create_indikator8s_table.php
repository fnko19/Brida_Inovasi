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
        Schema::create('indikator8s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi8_id'); 
            $table->string('nama8_inovasi');
            $table->enum('parameter8', ['Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah', 'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah', 'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah',]);
            $table->integer('bobot8')->nullable();
            $table->timestamps();

            $table->foreign('inovasi8_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator8s');
    }
};
