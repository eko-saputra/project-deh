<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id('siswa_id');
            $table->char('no_pendaftaran')->unique();
            $table->string('level');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('alamat');
            $table->string('sekolah_asal');
            $table->string('kelas_sa');
            $table->string('agama');
            $table->string('nama_ortu_ayah');
            $table->string('kerja_ortu_ayah');
            $table->string('no_ortu_ayah');
            $table->string('nama_ortu_ibu');
            $table->string('kerja_ortu_ibu');
            $table->string('no_ortu_ibu');
            $table->string('photo');
            $table->string('tahun_ajar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_siswa');
    }
};
