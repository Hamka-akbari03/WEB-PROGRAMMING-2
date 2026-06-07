<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@prak701.test'],
            [
                'username' => 'Admin PRAK701',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'dosen@prak701.test'],
            [
                'username' => 'Dosen Penguji',
                'password' => Hash::make('password'),
            ]
        );
    }
}