<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('indikator1s', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('inovasi_id'); 
        $table->string('nama_inovasi');
        // $table->foreignId('inovasi_id')->constrained()->onDelete('cascade');
        // $table->string('nama_indikator');
        // $table->text('informasi_indikator');
        $table->enum('parameter', ['SK Kepala Perangkat Daerah', 'SK Kepala Daerah', 'Peraturan Kepala Daerah/Peraturan Daerah',]);
        $table->integer('bobot')->default(0);
        $table->timestamps();

        $table->foreign('inovasi_id')->references('id')->on('inovasi_daerahs');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator1s');
    }
};
