<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    
    public $timestamps = false;

    protected $fillable = [
        'kd_cust',
        'nm_cust',
        'nm_peg',
        'kategori',
        'alm_cust',
        'wilayah',
        'telp',
        'telp2',
        'hp',
        'email'
    ];

    protected $primaryKey = 'kd_cust';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Relationship dengan Order
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'kd_cust', 'kd_cust');
    }
}
