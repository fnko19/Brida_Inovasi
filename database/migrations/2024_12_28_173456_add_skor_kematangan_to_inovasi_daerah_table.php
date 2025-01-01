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
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            $table->integer('skor_kematangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            $table->dropColumn('skor_kematangan');
        });
    }
};
