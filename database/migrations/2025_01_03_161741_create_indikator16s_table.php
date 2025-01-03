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
        Schema::create('indikator16s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi16_id'); 
            $table->string('nama16_inovasi');
            $table->enum('parameter16', ['Pernah 1 Kali direplikasi di daerah lain', 'Pernah 2 Kali direplikasi di daerah lain', 'Pernah 3 Kali direplikasi di daerah lain',]);
            $table->integer('bobot16')->nullable();
            $table->timestamps();

            $table->foreign('inovasi16_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator16s');
    }
};
