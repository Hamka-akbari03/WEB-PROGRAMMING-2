<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul_buku' => 'Pemrograman Web dengan Laravel',
                'penulis' => 'Andi Wijaya',
                'penerbit' => 'Informatika Press',
                'tahun_terbit' => 2023,
            ],
            [
                'judul_buku' => 'Dasar-dasar Basis Data',
                'penulis' => 'Siti Aisyah',
                'penerbit' => 'Media Akademik',
                'tahun_terbit' => 2021,
            ],
            [
                'judul_buku' => 'Analisis dan Perancangan Sistem',
                'penulis' => 'Budi Santoso',
                'penerbit' => 'Cendekia Nusantara',
                'tahun_terbit' => 2020,
            ],
        ];

        foreach ($data as $item) {
            Buku::updateOrCreate(
                ['judul_buku' => $item['judul_buku']],
                $item
            );
        }
    }
}