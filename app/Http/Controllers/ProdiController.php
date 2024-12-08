<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        $fakultas = Fakultas::all();
        return view('admin.prodi', compact('prodis', 'fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|string|max:255',
            'nama_prodi' => 'required|string|max:255',
            'kode_fakultas' => 'required|string|max:255',
        ]);

        Prodi::create($request->all());

        return redirect()->back()->with('success', 'Data prodi berhasil ditambahkan.');
    }

    public function destroy(Prodi $fakultas)
    {
        $fakultas->delete();
        return redirect()->back()->with('success', 'Data prodi berhasil dihapus.');
    }
}
