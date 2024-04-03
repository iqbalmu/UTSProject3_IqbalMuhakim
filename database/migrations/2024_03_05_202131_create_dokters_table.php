<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//   user_id int [ref: - user.id]
//   nomor_str string
//   nomor_sip string
//   foto string
//   spesialisasi string

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->string('nomor_str', 20);
            $table->string('nomor_sip', 20);
            $table->string('foto', 30);
            $table->string('spesialisasi', 30);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
