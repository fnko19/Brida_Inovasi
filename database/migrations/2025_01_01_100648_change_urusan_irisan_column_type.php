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
            $table->json('urusan_irisan')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('inovasi_daerahs', function (Blueprint $table) {
            // Kembalikan kolom ke tipe enum jika dibutuhkan
            $table->enum('urusan_irisan', [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
                '31', '32', '33', '34', '35', '36', '37', '38'
            ])->change();
        });
    }
    
};
