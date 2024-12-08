<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {

        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $prodis = Prodi::all();
        return view('admin.mahasiswa', compact('mahasiswas', 'dosens', 'prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'npm' => 'required|string|max:20|unique:mahasiswas',
            'tahun_masuk' => 'required|integer|digits:4',
            'kontak' => 'nullable|string|max:15',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->back()->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
