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
        Schema::create('indikator9s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi9_id'); 
            $table->string('nama9_inovasi');
            $table->enum('parameter9', ['Inovasi melibatkan 1-2 Perangkat Daerah', 'Inovasi melibatkan 3-4 Perangkat Daerah', 'Inovasi melibatkan 5 Perangkat Daerah atau lebih',]);
            $table->integer('bobot9')->nullable();
            $table->timestamps();

            $table->foreign('inovasi9_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator9s');
    }
};
