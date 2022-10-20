<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Tahun;
use Yajra\DataTables\Facades\DataTables;

use PDF;

class TagihanController extends Controller
{
    public function transaksiPembayaran()
    {
        $data['title'] = 'PEMBAYARAN';
        $data['subtitle'] = 'Pembayaran SPP';

        $data['tahun'] = Tahun::where('status', 1)->get();

        return view('tagihan/pembayaran', $data);
    }

    public function dataPembayaran(Request $request)
    {
        $data['title'] = 'DATA PEMBAYARAN';
        $data['subtitle'] = 'Pembayaran SPP';

        $data['tahun'] = Tahun::where('status', 1)->get();

        $ta = Tahun::where('status', 1)->get();
        if ($request->ajax()) {
            $data = Tagihan::join('tb_siswa', 'tb_siswa.no_pendaftaran', '=', 'tb_tagihan.no_pendaftaran')
                ->join('tb_level', 'tb_level.level_id', '=', 'tb_siswa.level')
                ->where(['tb_tagihan.status' => 1, 'tb_tagihan.tahun_ajar' => $ta[0]->tahun_ajar])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {

                    $sc =  'LUNAS';

                    return $sc;
                })
                ->addColumn('action', function ($row) {

                    $btn = '
                    <a href="detail-pembayaran/' . $row['no_pendaftaran'] . '" class="edit btn btn-primary btn-sm"><i class="mdi mdi-account-card-details"></i></a>
                    ';

                    return $btn;
                })
                ->rawColumns(['status'])
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('tagihan/data-pembayaran', $data);
    }

    function nominalSpp()
    {
        $data['tahun'] = Tahun::where('status', 1)->get();
        return Spp::where('tahun_ajar', $data['tahun'][0]->tahun_ajar)->get();
    }

    function cariSiswa($no)
    {
        return Siswa::where('no_pendaftaran', $no)->get();
        // return Siswa::join('tb_tagihan', 'tb_siswa.no_pendaftaran', '=', 'tb_tagihan.no_pendaftaran')->where('tb_siswa.no_pendaftaran', $no)->get();
    }

    function cariTagihan($no)
    {
        return Tagihan::where('no_pendaftaran', $no)->get();
        // return Siswa::join('tb_tagihan', 'tb_siswa.no_pendaftaran', '=', 'tb_tagihan.no_pendaftaran')->where('tb_siswa.no_pendaftaran', $no)->get();
    }

    function transaksiPembayaranAction(Request $request)
    {
        for ($i = 0; $i < count($request->bln); $i++) {

            $data['tahun'] = Tahun::where('status', 1)->get();
            Tagihan::where(['no_pendaftaran' => $request->noreg, 'bulan' => $request->bln[$i], 'tahun_ajar' => $data['tahun'][0]->tahun_ajar])->update([
                'status' => 1
            ]);
        }

        // return "ok";
        return $request->bln;
    }

    function Cetak($no, $bln, $bayar)
    {
        $siswa = Siswa::where('no_pendaftaran', $no)->get();
        $tahun = Tahun::where('status', 1)->get();
        $data = [
            'nama' => $siswa[0]->nama_lengkap,
            'noreg' => $no,
            'tahun' => $tahun[0]->tahun_ajar,
            'bln' => $bln,
            'bayar' => $bayar,
        ];

        $pdf = PDF::loadView('tagihan/cetak', $data)->setpaper('A7', 'landscape');

        return $pdf->stream('cetak.pdf');
    }
}
