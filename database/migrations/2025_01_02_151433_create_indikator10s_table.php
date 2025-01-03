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
        Schema::create('indikator10s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi10_id'); 
            $table->string('nama10_inovasi');
            $table->enum('parameter10', ['Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb', 'Konten melalui media sosial', 'Media berita',]);
            $table->integer('bobot10')->nullable();
            $table->timestamps();

            $table->foreign('inovasi10_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator10s');
    }
};
