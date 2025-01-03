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
        Schema::create('indikator18s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inovasi18_id'); 
            $table->string('nama18_inovasi');
            $table->enum('pilihParam18', ['Satuan orang (pegawai, peserta didik, pasien, dsb','Satuan unit (opd/uptd/rt/rw/kampung/KK, dsb','Satuan biaya (rupiah)','Satuan pendapatan (rupiah)','Satuan hasil produk/satuan penjualan',]);
            $table->enum('parameter18', ['Tidak dapat diukur','Jumlah pengguna atau penerima manfaat 1-100 orang','Jumlah pengguna atau penerima manfaat 101-200 orang','Jumlah pengguna atau penerima manfaat 201 orang atau lebih', 'Persentase peningkatan jumlah unit 5,00% - 20,00%','Persentase peningkatan jumlah unit 20,01% - 50,00%', 'Persentase peningkatan jumlah unit > 50%', 'Efisiensi belanja sebesar 0,01% - 10,00%', 'Efisiensi belanja sebesar 10,01% - 20,00%', 'Efisiensi belanja sebesar 20,01% - 30,00%', 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%', 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%', 'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%', 'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang', 'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang', 'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang']);
            $table->integer('bobot18')->nullable();
            $table->timestamps();

            $table->foreign('inovasi18_id')->references('id')->on('inovasi_daerahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator18s');
    }
};
