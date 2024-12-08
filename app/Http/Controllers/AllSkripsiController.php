<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class AllSkripsiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mahasiswas = Mahasiswa::with(['dosen', 'prodi', 'skripsi'])
            ->when($search, function ($query, $search) {
                $query->where('judul_skripsi', 'like', '%' . $search . '%')
                    ->orWhereHas('mahasiswa', function ($q) use ($search) {
                        $q->where('nama', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(6); // Batasi 6 item per halaman

        return view('admin.skripsi.allskripsi', compact('mahasiswas'));
    }

    // public function show($id)
    // {
    //     $mahasiswas = Mahasiswa::with(['dosens', 'prodi', 'skripsi'])->findOrFail($id);

    //     return view('admin.skripsi.detailskripsi', compact('mahasiswas'));
    // }
}
