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
        Schema::create('indikator17s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi17_id'); 
            $table->string('nama17_inovasi');
            $table->enum('parameter17', ['Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih', 'Inovasi dapat diciptakan dalam waktu 5-8 bulan', 'Inovasi dapat diciptakan dalam waktu 1-4 bulan',]);
            $table->integer('bobot17')->nullable();
            $table->timestamps();

            $table->foreign('inovasi17_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator17s');
    }
};
