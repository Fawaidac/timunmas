<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_pengguna')->insert([
            [
                'nm_user' => 'admin',
                'kata_kunci' => Hash::make('admin123'),
                'no_otor' => '001',
                'role' => 'admin',
                'nama_lengkap' => 'Administrator',
                'email' => 'admin@timunmas.com'
            ],
            [
                'nm_user' => 'user1',
                'kata_kunci' => Hash::make('user123'),
                'no_otor' => '002',
                'role' => 'sales',
                'nama_lengkap' => 'User Demo',
                'email' => 'user1@timunmas.com'
            ]
        ]);
    }
}
