<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 'tb_tahun';
    protected $primaryKey = 'tahun_id';

    protected $fillable = [
        'tahun_ajar',
        'status',
    ];
}
