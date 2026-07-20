<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganSales extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_sales';

    protected $fillable = [
        'nm_user',
        'kd_cust',
        'nm_cust',
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'catatan',
        'status',
        'order_no'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'waktu_kunjungan' => 'datetime'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'nm_user', 'nm_user');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_cust', 'kd_cust');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_no', 'no_ent');
    }
}
