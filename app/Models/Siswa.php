<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tb_siswa';
    protected $primaryKey = 'siswa_id';

    protected $fillable = [
        'no_pendaftaran',
        'level',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'alamat',
        'sekolah_asal',
        'kelas_sa',
        'agama',
        'nama_ortu_ayah',
        'kerja_ortu_ayah',
        'no_ortu_ayah',
        'nama_ortu_ibu',
        'kerja_ortu_ibu',
        'no_ortu_ibu',
        'photo',
        'tahun_ajar',
        'status',
    ];
}
