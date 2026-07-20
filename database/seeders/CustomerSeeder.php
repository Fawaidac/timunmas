<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer')->insert([
            [
                'kd_cust' => 'C001',
                'nm_cust' => 'PT. Maju Jaya',
                'alm_cust' => 'Jl. Raya No. 123, Jakarta',
                'telp' => '021-12345678',
                'email' => 'info@majujaya.com'
            ],
            [
                'kd_cust' => 'C002',
                'nm_cust' => 'CV. Berkah Sejahtera',
                'alm_cust' => 'Jl. Sudirman No. 456, Bandung',
                'telp' => '022-87654321',
                'email' => 'contact@berkah.com'
            ],
            [
                'kd_cust' => 'C003',
                'nm_cust' => 'Toko Sejahtera',
                'alm_cust' => 'Jl. Gatot Subroto No. 789, Surabaya',
                'telp' => '031-98765432',
                'email' => 'toko@sejahtera.com'
            ]
        ]);
    }
}
