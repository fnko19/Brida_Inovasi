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
        Schema::create('indikator6s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi6_id'); 
            $table->string('nama6_inovasi');
            $table->enum('parameter6', ['Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2', 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2', 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)',]);
            $table->integer('bobot6')->nullable();
            $table->timestamps();

            $table->foreign('inovasi6_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator6s');
    }
};
