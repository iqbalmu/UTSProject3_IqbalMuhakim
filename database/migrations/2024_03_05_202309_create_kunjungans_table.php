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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->date('tanggal');
            $table->date('waktu');
            $table->string('status');
            $table->foreignId('pasien_id')->references('id_pasien')->on('pasiens');
            $table->foreignId('dokter_id')->references('id_dokter')->on('dokters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};