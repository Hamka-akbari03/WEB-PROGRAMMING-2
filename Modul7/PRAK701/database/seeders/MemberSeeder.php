<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_member' => 'Ahmad Fikri',
                'nomor_member' => 'MBR001',
                'alamat' => 'Bandung',
                'tgl_mendaftar' => '2026-05-01 08:00:00',
                'tgl_terakhir_bayar' => '2026-06-01',
            ],
            [
                'nama_member' => 'Siti Aisyah',
                'nomor_member' => 'MBR002',
                'alamat' => 'Cimahi',
                'tgl_mendaftar' => '2026-05-03 09:15:00',
                'tgl_terakhir_bayar' => '2026-06-02',
            ],
        ];

        foreach ($data as $item) {
            Member::updateOrCreate(
                ['nomor_member' => $item['nomor_member']],
                $item
            );
        }
    }
}