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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('metode');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->foreignId('pasien_id')->references('id_pasien')->on('pasiens');
            $table->foreignId('rekam_medik_id')->references('id_rekam_medik')->on('rekam_mediks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
