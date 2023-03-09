<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Rombel;;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $data = Pembayaran::join('siswas' , 'siswas.nisn' , '=', 'pembayarans.nisn')
        ->join('spps' , 'siswas.id_spp' , '=' , 'spps.id')
        ->join('users' , 'pembayarans.id_petugas' , '=' , 'users.id')
        ->where('siswas.nis', Auth::user()->name)
        ->get();
        return view('historys.index', compact('data'));
    }
}
