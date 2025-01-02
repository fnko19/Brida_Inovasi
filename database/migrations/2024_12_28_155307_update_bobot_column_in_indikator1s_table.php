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
        Schema::table('indikator1s', function (Blueprint $table) {
            // Ubah kolom `bobot` agar tidak memiliki nilai default
            $table->integer('bobot')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('indikator1s', function (Blueprint $table) {
            // Kembalikan kolom `bobot` ke default sebelumnya
            $table->integer('bobot')->default(0)->change();
        });
    }
};

