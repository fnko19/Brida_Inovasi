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
        Schema::create('indikator11s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi11_id'); 
            $table->string('nama11_inovasi');
            $table->enum('parameter11', ['Telah terdapat Pedoman teknis berupa buku manual', 'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik', 'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial',]);
            $table->integer('bobot11')->nullable();
            $table->timestamps();

            $table->foreign('inovasi11_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator11s');
    }
};
