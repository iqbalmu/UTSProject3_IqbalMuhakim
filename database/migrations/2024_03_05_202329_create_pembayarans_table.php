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
            $table->increments('id_pembayaran');
            $table->string('metode', 50);
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('keterangan', 100);
            $table->unsignedInteger('pasien_id');
            $table->unsignedInteger('rekam_medik_id');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id_pasien')->on('pasiens')->onDelete('cascade');
            $table->foreign('rekam_medik_id')->references('id_rekam_medik')->on('rekam_mediks')->onDelete('cascade');
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
