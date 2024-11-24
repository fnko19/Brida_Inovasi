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
        Schema::create('inovasi_daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('dibuat_oleh');
            $table->string('nama_inovasi');
            $table->enum('tahapan_inovasi', ['inisiatif', 'uji_coba', 'penerapan']);  
            $table->enum('inisiator', ['kepala_daerah', 'anggota_dprd', 'opd', 'asn', 'masyarakat']);  
            $table->string('nama_inisiator');
            $table->enum('jenis_inovasi', ['1','2']); 
            $table->enum('bentuk_inovasi', ['daerah', 'layanan', 'tata_kelola']); 
            $table->enum('tematik', ['1', '2', '3', '4', '5',]);   
            $table->enum('prioritas', ['1','2']); 
            $table->enum('urusan_utama', [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
                '31', '32', '33', '34', '35', '36', '37', '38'
            ]); 
            $table->enum('urusan_irisan', [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
                '31', '32', '33', '34', '35', '36', '37', '38'
            ]); 
            $table->date('waktu_uji');
            $table->date('waktu_penerapan');
            $table->enum('berkembang', ['1','2']); 
            $table->text('rancang_bangun');
            $table->text('tujuan');
            $table->text('manfaat');
            $table->string('anggaran')->nullable();
            $table->string('profil_bisnis')->nullable();
            $table->string('doc_HAKI')->nullable();
            $table->string('penghargaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasi_daerahs');
    }
};
