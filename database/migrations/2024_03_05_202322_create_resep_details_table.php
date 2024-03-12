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
        Schema::create('resep_details', function (Blueprint $table) {
            $table->id('id_resep_detail');
            $table->string('metode');
            $table->integer('frekuensi');
            $table->integer('durasi');
            $table->foreignId('obat_id')->references('id_obat')->on('obats');
            $table->foreignId('resep_id')->references('id_resep')->on('reseps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_details');
    }
};
