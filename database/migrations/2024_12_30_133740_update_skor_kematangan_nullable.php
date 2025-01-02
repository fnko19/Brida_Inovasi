<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            $table->integer('skor_kematangan')->default(0)->nullable(false)->change(); // Mengubah kolom menjadi non-nullable dengan nilai default
        });
    }
    
    public function down()
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            $table->integer('skor_kematangan')->nullable()->change(); // Membalik perubahan
        });
    }
    
};
