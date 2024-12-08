<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultass = Fakultas::all();
        return view('admin.fakultas', compact('fakultass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
        ]);

        Fakultas::create($request->all());

        return redirect()->back()->with('success', 'Data fakultas berhasil ditambahkan.');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->back()->with('success', 'Data fakultas berhasil dihapus.');
    }
}
