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
        Schema::create('rekam_mediks', function (Blueprint $table) {
            $table->id('id_rekam_medik');
            $table->date('tanggal_pemeriksaan');
            $table->date('tanggal_entri');
            $table->string('diagnosis');
            $table->string('pengobatan');
            $table->string('hasil_pemeriksaan');
            $table->string('catatan_dokter');
            $table->string('rencana_perawatan');
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
        Schema::dropIfExists('rekam_mediks');
    }
};
