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
            $table->text('hasil_inovasi_sebelum')->nullable()->after('manfaat');
            $table->text('hasil_inovasi_setelah')->nullable()->after('hasil_inovasi_sebelum');

            $table->text('isu_global')->nullable()->after('masalah');
            $table->text('isu_nasional')->nullable()->after('isu_global');
            $table->text('isu_lokal')->nullable()->after('isu_nasional');

            $table->text('tujuan_menengah')->nullable()->after('spesifikasi_inovasi');
            $table->text('tujuan_pendek')->nullable()->after('tujuan_menengah');
            $table->text('tujuan_panjang')->nullable()->after('tujuan_pendek');

            $table->dropColumn('isu_strategis');
            $table->dropColumn('tujuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            // Hapus kolom baru
            $table->dropColumn('hasil_inovasi_sebelum');
            $table->dropColumn('hasil_inovasi_setelah');

            // Hapus kolom baru dari isu_strategis
            $table->dropColumn('isu_global');
            $table->dropColumn('isu_nasional');
            $table->dropColumn('isu_lokal');

            // Hapus kolom baru dari tujuan
            $table->dropColumn('tujuan_menengah');
            $table->dropColumn('tujuan_pendek');
            $table->dropColumn('tujuan_panjang');

            // Tambahkan kembali kolom lama
            $table->text('isu_strategis')->after('masalah');
            $table->text('tujuan')->after('spesifikasi_inovasi');
        });
    }
};
