<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'mst_pengguna';
    
    public $timestamps = false;

    protected $fillable = [
        'nm_user',
        'no_otor',
        'kata_kunci',
        'role',
        'nama_lengkap',
        'email'
    ];

    protected $primaryKey = 'nm_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = [
        'kata_kunci'
    ];
}
