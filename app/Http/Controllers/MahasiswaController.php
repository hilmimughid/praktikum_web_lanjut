<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('src');
        if (!empty($search)) {
            $mahasiswas = Mahasiswa::where(
                'nama',
                'like',
                "%$search%"
            )->paginate(5);
        } else {
            $mahasiswas = Mahasiswa::paginate(5);
        }

        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
            'no_handphone'=>'required',
            'email'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
            'no_handphone'=>'required',
            'email'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        Mahasiswa::find($nim)->update($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);

        $mahasiswa->delete();

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
