<?php

namespace App\Http\Controllers;

use App\Models\Petuga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class PetugaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petuga::all();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = Petuga::where('email', $request->email)->get();

        if(sizeof($email) == 1) {
            return redirect()->back();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'level' => '2'
        ]);
        Petuga::create([
            'username' => $request->name,
            'nama_petugas' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'level' => '2'
        ]);

        return redirect()->route('petugas.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function show(Petuga $petuga)
    {
        return view('petugas.show', compact('petuga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function edit(Petuga $petuga)
    {
        return view('petugas.edit', compact('petuga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petuga $petuga)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);

        $petuga->update($request->all());
        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petuga  $petuga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petuga $petuga)
    {
        // $petuga->delete();
        // Petuga::where('username')->delete();
        // User::where('nio')->$user->delete();
        $petuga->delete();
        // $user->delete();
        return redirect()->route('petugas.index');
    }
}
