<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $member = Member::where('nomor_member', 'MBR001')->first();
        $buku = Buku::where('judul_buku', 'Pemrograman Web dengan Laravel')->first();

        if (! $member || ! $buku) {
            return;
        }

        Peminjaman::updateOrCreate(
            [
                'id_member' => $member->id_member,
                'id_buku' => $buku->id_buku,
                'tgl_pinjam' => '2026-06-05',
            ],
            [
                'tgl_kembali' => '2026-06-12',
            ]
        );
    }
}