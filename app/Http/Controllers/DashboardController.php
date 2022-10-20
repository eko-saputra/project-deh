<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Level;
use App\Models\Tahun;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'DASHBOARD';
        $data['subtitle'] = 'Dumai English House';

        $data['tahun'] = Tahun::where('status', 1)->get();
        $siswa = Siswa::where('status', 1)->get();
        $data['jumlah_siswa'] = count($siswa);
        return view('dashboard', $data);
    }
}
