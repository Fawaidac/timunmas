<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'minta_appr';
    
    public $timestamps = false;

    protected $fillable = [
        'nomor',
        'tgl_minta',
        'jam_minta',
        'kd_user',
        'keterangan',
        'kd_user_appr',
        'tgl_appr',
        'jam_appr'
    ];

    protected $primaryKey = 'nomor';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'tgl_minta' => 'date',
        'tgl_appr' => 'date'
    ];
}
