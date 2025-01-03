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
        Schema::create('indikator12s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi12_id'); 
            $table->string('nama12_inovasi');
            $table->enum('parameter12', ['Informasi layanan diperoleh melalui 1 dari 4 metode', 'Informasi layanan diperoleh melalui 2 dari 4 metode', 'Informasi layanan diperoleh melalui 3 atau lebih metode',]);
            $table->integer('bobot12')->nullable();
            $table->timestamps();

            $table->foreign('inovasi12_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator12s');
    }
};
