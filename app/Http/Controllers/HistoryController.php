<?php

namespace App\Http\Controllers;

use App\Imports\HistoryImport;
use App\History;
use App\Exports\HistoryExport;
use Illuminate\Support\Facades\Storage;
use App\Models\ViewBayar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class HistoryController extends Controller
{

    public function index()
    {
        $data = DB::table('pembayarans')
        ->join('siswas' , 'pembayarans.nisn' , '=' , 'siswas.nisn')
        ->join('users' , 'pembayarans.id_petugas' , '=' , 'users.id')
        ->join('spps' , 'pembayarans.id_spp' , '=' , 'spps.id')
        ->orderBy('tgl_bayar' , 'desc')->get();

        return view('historys.index' , compact('data'));
    }

    public function import(ViewBayar $data)
    {
        $this->validate($data, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $data->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new HistoryImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('history.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('history.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
	// public function index()
	// {
	// 	$historypembayarans = Pembayaran::all();
	// 	$viewbayar = History::all();
	// 	return view('historys.index', compact('historypembayarans','viewbayar'));
	// }

	public function export_excel()
	{
		return Excel::download(new HistoryExport, 'Laporan Pembayaran.xlsx');
	}

}
