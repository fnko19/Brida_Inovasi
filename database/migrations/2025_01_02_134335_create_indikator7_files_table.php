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
        Schema::create('indikator7_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indikator7_id'); 
            $table->string('nomor_surat');
            $table->date('tgl_surat');
            $table->string('tentang');
            $table->string('file_path')->nullable();
            $table->timestamps();

            $table->foreign('indikator7_id')->references('id')->on('indikator7s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator7_files');
    }
};
