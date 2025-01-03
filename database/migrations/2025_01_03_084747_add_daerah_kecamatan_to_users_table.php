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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('kecamatan', [
                'Wajo', 'Biringkanaya', 'Tallo', 'Makassar', 'Manggala', 'Panakkukang',
                'Rappocini', 'Ujung Tanah', 'Kepulauan Sangkarrang', 'Mariso', 'Tamalanrea',
                'Bontoala', 'Ujung Pandang', 'Mamajang', 'Tamalate'
            ])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kecamatan');
        });
    }
};
