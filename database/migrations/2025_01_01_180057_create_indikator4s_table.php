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
        Schema::create('indikator4s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi4_id'); 
            $table->string('nama4_inovasi');
            $table->enum('parameter4', ['Pelaksanaan kerja secara manual/non elektronik', 'Pelaksanaan kerja secara elektronik', 'Pelaksanaan kerja sudah didukung sistem informasi online/daring',]);
            $table->integer('bobot4')->nullable();
            $table->timestamps();

            $table->foreign('inovasi4_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator4s');
    }
};
