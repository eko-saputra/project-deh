<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\Tahun;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class SppController extends Controller
{
    public function dataSpp(Request $request)
    {
        // echo "tes", exit;
        $data['title'] = 'DATA SPP';
        $data['subtitle'] = 'Manajemen Data SPP';

        $data['tahun'] = Tahun::where('status', 1)->get();
        // $tahun = Tahun::where('tahun_ajar', 'like', '%' . date('Y') . '%')->get();
        // if (count($tahun) > 0) {
        //     echo "ok";
        // } else {
        //     return redirect()->route('tambah.tahun')->with('danger', 'Tambahkan tahun ajaran sekarang!');
        // }
        // exit;
        if ($request->ajax()) {
            $data = Spp::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '
                    <a href="ubah-spp/' . $row['spp_id'] . '"" class="edit btn btn-warning btn-sm"><i class="mdi mdi-auto-fix"></i></a> 
                    <a href="hapus-spp/' . $row['spp_id'] . '"" class="edit btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('spp/data-spp', $data);
    }

    public function tambahSpp()
    {
        $data['title'] = 'TAMBAH DATA SPP';
        $data['subtitle'] = 'Manajemen Data SPP';
        $data['tahun'] = Tahun::where('status', 1)->get();
        return view('spp/tambah-spp', $data);
    }

    public function tambahSppAction(Request $request)
    {
        // echo $request->ta;
        // exit;
        $request->validate([
            'nominal' => 'required',
            'ta' => 'required|unique:tb_spp,tahun_ajar',

        ]);

        $spp = new Spp([
            'tahun_ajar' => $request->ta,
            'nominal' => $request->nominal,
        ]);

        $spp->save();

        return redirect()->route('data.spp')->with('success', 'Data SPP berhasil ditambahkan!');
    }

    public function ubahSpp($id)
    {
        $data['title'] = 'UBAH DATA SPP';
        $data['subtitle'] = 'Manajemen Data Level';
        $data['tahun'] = Tahun::where('status', 1)->get();
        $data['spp'] = Spp::where('spp_id', $id)->get();
        return view('spp/ubah-spp', $data);
    }

    public function ubahSppAction(Request $request)
    {
        $request->validate([
            'nominal' => 'required',
            'ta' => 'required',
        ]);

        Spp::where('spp_id', $request->id)->update([
            'tahun_ajar' => $request->ta,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('data.spp')->with('success', 'Data SPP berhasil diubah!');
    }

    public function hapusSpp($id)
    {
        Spp::where('spp_id', $id)->delete();
        return redirect()->route('data.spp')->with('success', 'Data SPP berhasil dihapus!');
    }
}
