<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Tahun;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function dataLevel(Request $request)
    {
        $data['title'] = 'DATA Level';
        $data['subtitle'] = 'Manajemen Data Level';

        $data['tahun'] = Tahun::where('status', 1)->get();

        if ($request->ajax()) {
            $data = Level::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '
                    <a href="ubah-level/' . $row['level_id'] . '"" class="edit btn btn-warning btn-sm"><i class="mdi mdi-auto-fix"></i></a> 
                    <a href="hapus-level/' . $row['level_id'] . '"" class="edit btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('level/data-level', $data);
    }

    public function tambahLevel()
    {
        $data['title'] = 'TAMBAH DATA LEVEL';
        $data['subtitle'] = 'Manajemen Data Level';
        $data['tahun'] = Tahun::where('status', 1)->get();
        return view('level/tambah-level', $data);
    }

    public function tambahLevelAction(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tb_level,nama_level',

        ]);

        $level = new Level([
            'nama_level' => $request->nama,
        ]);

        $level->save();

        return redirect()->route('data.level')->with('success', 'Data level berhasil ditambahkan!');
    }

    public function ubahLevel($id)
    {
        $data['title'] = 'UBAH DATA LEVEL';
        $data['subtitle'] = 'Manajemen Data Level';
        $data['level'] = Level::where('level_id', $id)->get();
        $data['tahun'] = Tahun::where('status', 1)->get();
        return view('level/ubah-level', $data);
    }

    public function ubahLevelAction(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Level::where('level_id', $request->id)->update([
            'nama_level' => $request->nama,
        ]);

        return redirect()->route('data.level')->with('success', 'Data level berhasil diubah!');
    }

    public function hapusLevel($id)
    {
        Level::where('level_id', $id)->delete();
        return redirect()->route('data.level')->with('success', 'Data level berhasil dihapus!');
    }
}
