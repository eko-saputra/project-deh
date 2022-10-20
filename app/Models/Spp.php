<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;

    protected $table = 'tb_spp';
    protected $primaryKey = 'spp_id';

    protected $fillable = [
        'tahun_ajar',
        'nominal',
    ];
}
