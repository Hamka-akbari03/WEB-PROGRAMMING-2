<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id_member');
            $table->string('nama_member');
            $table->string('nomor_member')->unique();
            $table->text('alamat');
            $table->dateTime('tgl_mendaftar');
            $table->date('tgl_terakhir_bayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};