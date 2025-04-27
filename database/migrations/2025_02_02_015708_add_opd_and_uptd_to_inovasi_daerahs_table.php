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
            $table->unsignedBigInteger('opd_id')->nullable()->after('berkembang');
            $table->unsignedBigInteger('uptd_id')->nullable()->after('opd_id');

            // Menambahkan foreign key
            $table->foreign('opd_id')->references('id')->on('daftar_opds')->onDelete('cascade');
            $table->foreign('uptd_id')->references('id')->on('daftar_uptds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            $table->dropForeign(['opd_id']);
            $table->dropForeign(['uptd_id']);
            $table->dropColumn(['opd_id', 'uptd_id']);
        });
    }
};