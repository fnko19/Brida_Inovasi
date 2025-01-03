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
        Schema::create('indikator20s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi20_id'); 
            $table->string('nama20_inovasi');
            $table->enum('parameter20', ['Memenuhi 1 atau 2 unsur substansi','Memenuhi 3 atau 4 unsur substansi', 'Memenuhi 5 unsur substansi']);
            $table->integer('bobot20')->nullable();
            $table->timestamps();

            $table->foreign('inovasi20_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator20s');
    }
};
