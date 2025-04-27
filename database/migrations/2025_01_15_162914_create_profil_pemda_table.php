<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilPemdaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_pemda', function (Blueprint $table) {
            $table->id();
            $table->string('tingkatan');
            $table->string('opd_yang_menangani');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->string('admin');
            $table->text('pakta_integritas');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_pemda');
    }
};
