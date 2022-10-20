<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tb_tagihan';
    protected $primaryKey = 'tagihan_id';

    protected $fillable = [
        'no_pendaftaran',
        'bulan',
        'tahun_ajar',
        'status',
    ];
}
