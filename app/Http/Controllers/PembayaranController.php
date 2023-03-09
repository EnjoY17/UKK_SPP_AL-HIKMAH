<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\ViewBayar;
use App\Models\Rombel;
use App\Models\ViewSiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarans = Pembayaran::join('siswas' , 'siswas.nisn' , '=', 'pembayarans.nisn' )
        ->get();

        return view('pembayarans.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = DB::table('siswas')
        ->join('spps' , 'siswas.id_spp' , '=' , 'spps.id')->get();
        return view('pembayarans.create', compact('siswa'));
    }

    public function getDataSpp($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();
        $view_siswa = Viewsiswa::where('nisn', $nisn)->get();


        $spp = Spp::find($siswa->id_spp);
        $pembayaran = Pembayaran::where('nisn', $nisn)->get();
        $indx = array_key_last(end($pembayaran));
        $urutan = array_key_last(end($view_siswa));
        $data = [
        'harga' => $pembayaran[$indx],
        'siswa' => $siswa[$indx],
        'kelas' => Rombel::find($siswa->id_kelas),
        'akhir' => $pembayaran,
        'nominal' => $view_siswa[$urutan],
        ];
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
        ]);


       
        for ($i = 0; $i < $request->bayar_berapa; $i++) {
            $bulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

            $siswa = Siswa::where('nisn', '=', $request->nisn)->first();
            $spp = Spp::where('id', '=', $siswa->id_spp)->first();
            $pembayaran = Pembayaran::where('nisn', '=', $siswa->nisn)->get();

            if ($pembayaran->isEmpty()) {
                $bln = 6;
                $tahun = substr($spp->tahun, 0, 4);
            } else {
                $pembayaran = Pembayaran::where('nisn', '=', $siswa->nisn)
                    ->orderBy('id', 'Desc')->latest()
                    ->first();

                $bln = array_search($pembayaran->bulan_dibayar, $bulan);

                if ($bln == 11) {
                    $bln = 0;
                    $tahun = $pembayaran->tahun_dibayar + 1;
                } else {
                    $bln = $bln + 1;
                    $tahun = $pembayaran->tahun_dibayar;
                }

                if ($pembayaran->tahun_dibayar == substr($spp->tahun, -4, 4) && $pembayaran->bulan_dibayar == 'mei') {
                    return back()->with('error', 'sudah lunas');
                }
            }

            if ($request->jumlah_bayar < $spp->nominal) {
                return back()->with('error', 'Uang yang dimasukan tidak sesuai');
            }

            $pembayaranSimpan = Pembayaran::create([
                'id_petugas' => auth()->user()->id,
                'nisn' => $request->nisn,
                'tgl_bayar' => Carbon::now(),
                'bulan_dibayar' => $bulan[$bln],
                'tahun_dibayar' => $tahun,
                'id_spp' => $spp->id,
                'jumlah_bayar' => $request->jumlah_bayar 
            ]);
        }

        if ($pembayaranSimpan) {
            return redirect()->route('pembayarans.index')->with('success', 'data berhasil masuk');
        } else {
            return redirect()->back()->with('error', 'data gagal masuk');
        }
    }

    
    public function getData($nisn , $berapa)
    {
        // $siswa = Siswa::where('nisn', $nisn)->first();
        $siswa = Siswa::where('nisn', '=', $nisn)->first();
        $spp = Spp::where('id', '=', $siswa->id_spp)->first();
        $pembayaran = Pembayaran::where('nisn', '=', $nisn)
            ->orderBy('id', 'Desc')->latest()
            ->first();


        if ($pembayaran == null) {
            $data = [
                'nominal' => $spp->nominal * $berapa,
                'bulan' => 'belum pernah bayar',
                'tahun' => '',
            ];
        } else {

            if ($pembayaran->tahun_dibayar == substr($spp->tahun, -4, 4) && $pembayaran->bulan_dibayar == 'juni') {
                $data = [
                    'nominal' => $spp->nominal * $berapa,
                    'bulan' => 'sudah lunas',
                    'tahun' => '',
                ];
            } else {
                $data = [
                    'nominal' => $spp->nominal * $berapa,
                    'bulan' => $pembayaran->bulan_dibayar,
                    'tahun' => $pembayaran->tahun_dibayar,
                ];
            }
        }

        return response()->json($data);
    }
}
