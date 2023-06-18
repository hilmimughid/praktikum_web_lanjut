<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $mahasiswa = Mahasiswa::where('nama','like','%'.$request->search.'%')->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $mahasiswa = Mahasiswa::orderBy('nim', 'desc')->paginate(10);
        }

        return view('mahasiswas.index', ['mahasiswa' => $mahasiswa, 'paginate' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    public function print_pdf($nim)
    {
        $mahasiswa = Mahasiswa::with('matakuliah')->where('nim', $nim)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('mahasiswas.print_pdf', ['mahasiswa' => $mahasiswa]);
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'image' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->image = $request->get('image');
        $mahasiswa->jurusan = $request->get('jurusan');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);

        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswa->image = $image_name;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();

        return view('mahasiswas.detail', ['mahasiswa' => $mahasiswa]);
    }

    public function showKhs($nim)
    {
        $mahasiswa = Mahasiswa::with('matakuliah')->where('nim', $nim)->first();

        return view('mahasiswas.khs', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();

        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);

        if ($request->hasFile('image')) {
            if ($mahasiswa->image && file_exists(storage_path('app/public/' . $mahasiswa->image))) {
                \Storage::delete('public/' . $mahasiswa->image);
            }
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswa->image = $image_name;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa != null) {
            $mahasiswa->matakuliah()->detach();
            $mahasiswa->delete();
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
        }

        return redirect()->route('mahasiswas.index')->with('error', 'Mahasiswa Tidak Ditemukan');
    }
}
