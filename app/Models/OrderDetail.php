<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'det_ord_jual';
    
    public $timestamps = false;

    protected $fillable = [
        'no_ent',
        'kd_brg',
        'nm_brg',
        'qty',
        'harga',
        'subtotal',
        'satuan'
    ];

    protected $casts = [
        'qty' => 'integer',
        'harga' => 'decimal:2',
        'subtotal' => 'decimal:2'
    ];

    /**
     * Relationship dengan Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'no_ent', 'no_ent');
    }

    /**
     * Relationship dengan Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_brg', 'kd_brg');
    }
}
