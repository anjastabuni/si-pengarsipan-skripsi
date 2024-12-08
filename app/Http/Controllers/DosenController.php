<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('admin.dosen', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nidn' => 'required|string|max:10|unique:dosens',
            'jabatan_akademik' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        Dosen::create($request->all());

        return redirect()->back()->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->back()->with('success', 'Data dosen berhasil dihapus.');
    }
}
