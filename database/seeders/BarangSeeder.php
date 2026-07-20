<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'kd_brg' => 'BRG001',
                'nm_brg' => 'Laptop Dell Inspiron 15',
                'satuan1' => 'PCS',
                'harga_jl' => 8500000.00,
                'stok_a' => 50.00
            ],
            [
                'kd_brg' => 'BRG002',
                'nm_brg' => 'Mouse Logitech M170',
                'satuan1' => 'PCS',
                'harga_jl' => 85000.00,
                'stok_a' => 200.00
            ],
            [
                'kd_brg' => 'BRG003',
                'nm_brg' => 'Keyboard Mechanical',
                'satuan1' => 'PCS',
                'harga_jl' => 450000.00,
                'stok_a' => 100.00
            ],
            [
                'kd_brg' => 'BRG004',
                'nm_brg' => 'Monitor LG 24 Inch',
                'satuan1' => 'PCS',
                'harga_jl' => 2100000.00,
                'stok_a' => 75.00
            ],
            [
                'kd_brg' => 'BRG005',
                'nm_brg' => 'Printer Canon G2010',
                'satuan1' => 'PCS',
                'harga_jl' => 2450000.00,
                'stok_a' => 30.00
            ]
        ]);
    }
}
