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
        Schema::create('indikator7s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi7_id'); 
            $table->string('nama7_inovasi');
            $table->enum('parameter7', ['Inovasi melibatkan 3 aktor', 'Inovasi melibatkan 4 aktor', 'Inovasi melibatkan 5 aktor atau lebih',]);
            $table->integer('bobot7')->nullable();
            $table->timestamps();

            $table->foreign('inovasi7_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator7s');
    }
};
