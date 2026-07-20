<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'mst_ord_jual';
    
    public $timestamps = false;

    protected $fillable = [
        'no_ent',
        'tanggal',
        'kd_cust',
        'nm_cust',
        'alm_cust',
        'total',
        'kd_user',
        'nm_user',
        'nm_peg',
        'jns_bayar',
        'keterangan',
        'status'
    ];

    protected $primaryKey = 'no_ent';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'tanggal' => 'date',
        'total' => 'decimal:2'
    ];

    /**
     * Relationship dengan Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_cust', 'kd_cust');
    }

    /**
     * Relationship dengan OrderDetail
     */
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'no_ent', 'no_ent');
    }
}
