<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $profilId = DB::table('profils')->value('id');

        if (! $profilId) {
            return;
        }

        DB::table('kegiatans')->insert([
            [
                'profil_id' => $profilId,
                'kegiatan_judul' => 'Praktikum Pemrograman Web II',
                'kegiatan_deskripsi' => 'Belajar membangun aplikasi web dengan struktur MVC yang rapi, fitur dinamis, dan tampilan modern menggunakan Laravel.',
                'kegiatan_waktu' => 'Semester 4',
                'kegiatan_dokumentasi' => 'kegiatan-1.jpg',
                'kegiatan_kesan' => 'Sangat berkesan karena membuka pemahaman alur kerja framework secara lebih nyata.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profil_id' => $profilId,
                'kegiatan_judul' => 'Lulus Pendanaan Insentif PKM GFT 2026',
                'kegiatan_deskripsi' => 'Berhasil menyusun proposal gagasan futuristik tertulis yang solutif dan inovatif bersama tim, hingga sukses melewati seleksi ketat dan meraih pendanaan insentif nasional dari Belmawa Kemendikbudristek.',
                'kegiatan_waktu' => 'Semester 4',
                'kegiatan_dokumentasi' => 'kegiatan-2.jpg',
                'kegiatan_kesan' => 'Sangat membanggakan karena dapat membawa nama baik kampus di tingkat nasional, serta melatih kemampuan berpikir kritis, analisis masalah, dan penulisan ilmiah yang terstruktur.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profil_id' => $profilId,
                'kegiatan_judul' => 'Ikut Workshop atau bootcamp Cybersecurity',
                'kegiatan_deskripsi' => 'Mengikuti rangkaian pelatihan intensif mengenai keamanan informasi, analisis risiko jaringan, serta teknik deteksi ancaman siber untuk memperkuat fondasi pertahanan infrastruktur digital.',
                'kegiatan_waktu' => 'Semester 4',
                'kegiatan_dokumentasi' => 'kegiatan-3.jpg',
                'kegiatan_kesan' => 'Sangat membuka wawasan mengenai pentingnya menjaga integritas data dan memberikan pemahaman praktis yang mendalam tentang cara memitigasi berbagai celah keamanan siber.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profil_id' => $profilId,
                'kegiatan_judul' => 'Ikut Lomba VEND-IT 2024',
                'kegiatan_deskripsi' => 'Berpartisipasi aktif sebagai representasi mahasiswa dalam ajang kompetisi VEND-IT dengan mengikuti dua cabang perlombaan sekaligus, yaitu turnamen Catur untuk menguji strategi individu dan Mobile Legends untuk mengasah kerja sama tim.',
                'kegiatan_waktu' => 'Semester 1',
                'kegiatan_dokumentasi' => 'kegiatan-4.jpg',
                'kegiatan_kesan' => 'Meskipun belum berhasil membawa juara, kompetisi ini memberikan pengalaman berharga tentang pentingnya fokus, sportivitas, mentalitas kompetitif, serta membangun ikatan kebersamaan yang kuat dengan tim.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
