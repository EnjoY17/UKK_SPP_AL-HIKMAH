<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $spps = Spp::all();
        $rombels = Rombel::all();
        return view('siswas.index', compact('siswa', 'spps', 'rombels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombels = Rombel::all();
        $spps = Spp::all();
        return view('siswas.create', compact('rombels', 'spps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'=>'required',
            'nis'=>'required',
            'nama'=>'required',
            'id_kelas'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'id_spp'=>'required',

        ]);

        Siswa::create($request->all());
        User::create([
            'id'=>$request->id,
            'name'=>$request->nama,
            'email'=>$request->nis ."@gmail.com",
            'password' => Hash::make($request->nis),
            'level'=>'3',
        ]);
        return redirect()->route('siswas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $rombels = Rombel::all();
        $spps = Spp::all();
        return view('siswas.edit', compact('rombels', 'spps', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn'=>'required',
            'nis'=>'required',
            'nama'=>'required',
            'id_kelas'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'id_spp'=>'required',

        ]);

        $siswa->update($request->all());
        return redirect()->route('siswas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index');
    }
}
