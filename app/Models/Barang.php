<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    
    // Disable timestamps jika table tidak punya created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'kd_brg',
        'nm_brg',
        'jns_brg',
        'merk',
        'satuan1',
        'harga_jl',
        'stok_a'
    ];

    // Primary key jika bukan 'id'
    protected $primaryKey = 'kd_brg';
    public $incrementing = false;
    protected $keyType = 'string';
}
