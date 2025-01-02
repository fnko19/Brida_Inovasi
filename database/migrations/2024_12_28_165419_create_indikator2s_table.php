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
        Schema::create('indikator2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi2_id'); 
            $table->string('nama2_inovasi');
        // $table->foreignId('inovasi_id')->constrained()->onDelete('cascade');
        // $table->string('nama_indikator');
        // $table->text('informasi_indikator');
            $table->enum('parameter2', ['1-10 SDM', '11-30 SDM', 'Lebih dari 30',]);
            //$table->integer('bobot2')->default(null)->change();
            $table->timestamps();

        $table->foreign('inovasi2_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator2s');
    }
};
