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
        Schema::create('indikator14s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi14_id'); 
            $table->string('nama14_inovasi');
            $table->enum('parameter14', ['Kurang dari sama dengan 50% atau Tidak ada pengaduan', '51% s.d 86%', 'lebih dari sama dengan 86%',]);
            $table->integer('bobot14')->nullable();
            $table->timestamps();

            $table->foreign('inovasi14_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator14s');
    }
};
