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
            // Tambahkan kolom baru atau perubahan yang diinginkan
            $table->foreignId('laporan_diklat_id')->nullable()->constrained('laporan_diklats')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            // Hapus kolom yang baru ditambahkan jika migrasi dibatalkan
            $table->dropForeign(['laporan_diklat_id']);
            $table->dropColumn('laporan_diklat_id');
        });
    }
};
