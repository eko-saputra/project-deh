<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Level;
use App\Models\Tahun;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    public function dataSiswa(Request $request)
    {
        $data['title'] = 'DATA SISWA';
        $data['subtitle'] = 'Manajemen Data Siswa';

        $data['tahun'] = Tahun::where('status', 1)->get();

        if ($request->ajax()) {
            $data = Siswa::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '
                    <a href="detail-siswa/' . $row['siswa_id'] . '" class="edit btn btn-primary btn-sm"><i class="mdi mdi-account-card-details"></i></a> 
                    <a href="ubah-siswa/' . $row['siswa_id'] . '"" class="edit btn btn-warning btn-sm"><i class="mdi mdi-auto-fix"></i></a> 
                    <a href="hapus-siswa/' . $row['siswa_id'] . '"" class="edit btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('siswa/data-siswa', $data);
    }

    public function tambahSiswa()
    {
        $data['title'] = 'TAMBAH DATA SISWA';
        $data['subtitle'] = 'Manajemen Data Siswa';

        $data['tahun'] = Tahun::where('status', 1)->get();

        $data['level'] = Level::all();
        return view('siswa/tambah-siswa', $data);
    }

    public function tambahSiswaAction(Request $request)
    {
        $data['tahun'] = Tahun::where('status', 1)->get();
        $request->validate([
            'no' => 'required|unique:tb_siswa,no_pendaftaran',
            'level' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'sa' => 'required',
            'ksa' => 'required',
            'n_ayah' => 'required',
            'k_ayah' => 'required',
            'no_ayah' => 'required',
            'n_ibu' => 'required',
            'k_ibu' => 'required',
            'no_ibu' => 'required',

        ]);
        $image_path = $request->file('photo')->store('uploads', 'public');

        $siswa = new Siswa([
            'no_pendaftaran' => $request->no,
            'level' => $request->level,
            'nama_lengkap' => $request->nama,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tgl,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'sekolah_asal' => $request->sa,
            'kelas_sa' => $request->ksa,
            'agama' => $request->agama,
            'nama_ortu_ayah' => $request->n_ayah,
            'kerja_ortu_ayah' => $request->k_ayah,
            'no_ortu_ayah' => $request->no_ayah,
            'nama_ortu_ibu' => $request->n_ibu,
            'kerja_ortu_ibu' => $request->k_ibu,
            'no_ortu_ibu' => $request->no_ibu,
            'photo' => $image_path,
            'tahun_ajar' => $data['tahun'][0]->tahun_ajar,
            'status' => 1,
        ]);

        $siswa->save();

        $bulan = ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
        for ($i = 0; $i <= 11; $i++) {
            $tagihan = new Tagihan([
                'no_pendaftaran' => $request->no,
                'tahun_ajar' => $data['tahun'][0]->tahun_ajar,
                'bulan' => $bulan[$i],
                'status' => 0,
            ]);
            $tagihan->save();
        }


        return redirect()->route('data.siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function detailSiswa($id)
    {
        $data['title'] = 'DETAIL DATA SISWA';
        $data['subtitle'] = 'Manajemen Data Siswa';

        $data['tahun'] = Tahun::where('status', 1)->get();

        $data['siswa'] = Siswa::where('siswa_id', $id)->get();
        foreach ($data['siswa'] as $s) {
            $no = $s->no_pendaftaran;
        }
        $data['tagihan'] = Tagihan::where('no_pendaftaran', $no)->get();
        return view('siswa/detail-siswa', $data);
    }

    public function ubahSiswa($id)
    {
        $data['title'] = 'UBAH DATA SISWA';
        $data['subtitle'] = 'Manajemen Data Siswa';

        $data['tahun'] = Tahun::where('status', 1)->get();

        $data['siswa'] = Siswa::where('siswa_id', $id)->get();
        $data['level'] = Level::all();
        return view('siswa/ubah-siswa', $data);
    }

    public function ubahSiswaAction(Request $request)
    {
        if ($request->file('photo') == "") {
            $request->validate([
                'no' => 'required',
                'level' => 'required',
                'nama' => 'required',
                'tempat' => 'required',
                'tgl' => 'required',
                'gender' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                'sa' => 'required',
                'ksa' => 'required',
                'n_ayah' => 'required',
                'k_ayah' => 'required',
                'no_ayah' => 'required',
                'n_ibu' => 'required',
                'k_ibu' => 'required',
                'no_ibu' => 'required',
            ]);

            Siswa::where('siswa_id', $request->id)->update([
                'no_pendaftaran' => $request->no,
                'level' => $request->level,
                'nama_lengkap' => $request->nama,
                'tempat_lahir' => $request->tempat,
                'tgl_lahir' => $request->tgl,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'sekolah_asal' => $request->sa,
                'kelas_sa' => $request->ksa,
                'agama' => $request->agama,
                'nama_ortu_ayah' => $request->n_ayah,
                'kerja_ortu_ayah' => $request->k_ayah,
                'no_ortu_ayah' => $request->no_ayah,
                'nama_ortu_ibu' => $request->n_ibu,
                'kerja_ortu_ibu' => $request->k_ibu,
                'no_ortu_ibu' => $request->no_ibu,
            ]);
        } else {
            $request->validate([
                'no' => 'required',
                'level' => 'required',
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'nama' => 'required',
                'tempat' => 'required',
                'tgl' => 'required',
                'gender' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                'sa' => 'required',
                'ksa' => 'required',
                'n_ayah' => 'required',
                'k_ayah' => 'required',
                'no_ayah' => 'required',
                'n_ibu' => 'required',
                'k_ibu' => 'required',
                'no_ibu' => 'required',

            ]);
            $image_path = $request->file('photo')->store('uploads', 'public');

            Siswa::where('siswa_id', $request->id)->update([
                'no_pendaftaran' => $request->no,
                'level' => $request->level,
                'nama_lengkap' => $request->nama,
                'tempat_lahir' => $request->tempat,
                'tgl_lahir' => $request->tgl,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'sekolah_asal' => $request->sa,
                'kelas_sa' => $request->ksa,
                'agama' => $request->agama,
                'nama_ortu_ayah' => $request->n_ayah,
                'kerja_ortu_ayah' => $request->k_ayah,
                'no_ortu_ayah' => $request->no_ayah,
                'nama_ortu_ibu' => $request->n_ibu,
                'kerja_ortu_ibu' => $request->k_ibu,
                'no_ortu_ibu' => $request->no_ibu,
                'photo' => $image_path,
            ]);
        }

        return redirect()->route('data.siswa')->with('success', 'Data siswa berhasil diubah!');
    }

    public function hapusSiswa($id)
    {
        Siswa::where('siswa_id', $id)->delete();
        return redirect()->route('data.siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
