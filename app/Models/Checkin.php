<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $table = 'checkin';

    protected $fillable = [
        'nm_user',
        'kd_cust',
        'nm_cust',
        'latitude',
        'longitude',
        'alamat_lengkap',
        'waktu_checkin',
        'catatan'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'waktu_checkin' => 'datetime'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'nm_user', 'nm_user');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_cust', 'kd_cust');
    }
}
