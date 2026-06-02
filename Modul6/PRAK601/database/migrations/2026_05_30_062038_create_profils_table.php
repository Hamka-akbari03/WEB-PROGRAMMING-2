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
    Schema::create('profils', function (Blueprint $table) {
        $table->id();
        // Informasi Utama Praktikan
        $table->string('nama_lengkap');
        $table->string('nim');
        $table->string('asal_prodi');
        $table->string('hobi');
        $table->string('skill');
        $table->string('foto_profil')->nullable(); // Menyimpan jalur nama file foto profil
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
