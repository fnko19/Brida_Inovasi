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
        Schema::create('indikator15s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi15_id'); 
            $table->string('nama15_inovasi');
            $table->enum('parameter15', ['Tidak dapat diukur','Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah','Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan','Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain', 'Layanan inovasi berjalan secara tersendiri (independen)','Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan','Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan',]);
            $table->integer('bobot15')->nullable();
            $table->timestamps();

            $table->foreign('inovasi15_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator15s');
    }
};
