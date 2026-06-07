<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->unsignedInteger('id_member');
            $table->unsignedInteger('id_buku');
            $table->timestamps();

            $table->foreign('id_member')->references('id_member')->on('member')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_buku')->references('id_buku')->on('buku')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};