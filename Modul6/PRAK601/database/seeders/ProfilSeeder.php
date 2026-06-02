<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        // Menyuntikkan data biodata praktikan ke tabel profils (cukup 1 data)
        $profilId = DB::table('profils')->insertGetId([
            'nama_lengkap' => 'Muhammad Hamka Akbari',
            'nim' => '2410817110007',
            'asal_prodi' => 'Teknologi Informasi',
            'hobi' => 'Membaca, Koding, Game',
            'skill' => 'PHP, Laravel, HTML, CSS',
            'foto_profil' => 'foto-profil.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kegiatan sekarang dipisah ke seeder tersendiri (KegiatanSeeder)
    }
}