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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role', ['admin', 'user'])->default('user');  // Menambahkan kolom role
            $table->enum('function', ['upt', 'opd'])->nullable();  // Menambahkan kolom function, nullable karena hanya user yang memilih
            $table->foreignId('daftar_upt_id')->nullable()->constrained('daftar_uptds')->onDelete('set null');  // Menambahkan hubungan ke UPT, nullable karena admin tidak memilih
            $table->foreignId('daftar_opd_id')->nullable()->constrained('daftar_opds')->onDelete('set null');  // Menambahkan hubungan ke OPD, nullable karena admin tidak memilih
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
