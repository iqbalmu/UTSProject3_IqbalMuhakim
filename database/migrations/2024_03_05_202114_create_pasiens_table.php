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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('profesi');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('riwayat_kesehatan');
            $table->string('alergi');
            $table->string('kondisi_khusus');
            $table->string('status_nikah');
            $table->string('nama_keluarga');
            $table->string('nomor_hp_keluarga');
            $table->string('alamat_keluarga');
            $table->date('tanggal_datar');
            $table->foreignId('user_id')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
