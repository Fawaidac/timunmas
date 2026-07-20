<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'no_bayar',
        'nm_user',
        'kd_cust',
        'nm_cust',
        'no_faktur',
        'nominal',
        'metode_bayar',
        'keterangan',
        'status',
        'approved_by',
        'approved_at',
        'reject_reason'
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'approved_at' => 'datetime'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'nm_user', 'nm_user');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_cust', 'kd_cust');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Pengguna::class, 'approved_by', 'nm_user');
    }
}
