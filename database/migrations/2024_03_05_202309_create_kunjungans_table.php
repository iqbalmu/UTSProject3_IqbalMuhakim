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
            $table->increments('id_kunjungan');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('status', 10);
            $table->unsignedInteger('pasien_id');
            $table->unsignedInteger('dokter_id');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id_pasien')->on('pasiens');
            $table->foreign('dokter_id')->references('id_dokter')->on('dokters');
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
