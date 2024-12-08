<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkripsiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $skripsis = Skripsi::all();
        return view('admin.skripsi', compact('skripsis', 'mahasiswas'));
    }

    


    // Menyimpan data Skripsi
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul_skripsi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun_publikasi' => 'required|integer|min:1900|max:' . date('Y'),
            'jenis_dokumen' => 'required|string|in:Skripsi,Tesis,Disertasi',
            'file_skripsi' => 'required|file|mimes:pdf|max:20480',  // max size 20MB
            'lokasi_fisik' => 'nullable|string|max:255',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
        ]);

        // Menyimpan file skripsi
        if ($request->hasFile('file_skripsi')) {
            $file = $request->file('file_skripsi');
            $filePath = $file->store('skripsi_files', 'public');
        }

        // Menyimpan data Skripsi ke database
        $skripsi = new Skripsi();
        $skripsi->judul_skripsi = $validatedData['judul_skripsi'];
        $skripsi->deskripsi = $validatedData['deskripsi'];
        $skripsi->tahun_publikasi = $validatedData['tahun_publikasi'];
        $skripsi->jenis_dokumen = $validatedData['jenis_dokumen'];
        $skripsi->file_skripsi = $filePath ?? null; // Menyimpan path file
        $skripsi->lokasi_fisik = $validatedData['lokasi_fisik'];
        $skripsi->mahasiswa_id = $validatedData['mahasiswa_id'];
        $skripsi->save();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('admin.skripsi')->with('success', 'Skripsi berhasil disimpan.');
    }

    // Menghapus data Skripsi
    public function destroy($id)
    {
        $skripsi = Skripsi::findOrFail($id);

        // Hapus file jika ada
        if ($skripsi->file_skripsi) {
            Storage::disk('public')->delete($skripsi->file_skripsi);
        }

        $skripsi->delete();

        return redirect()->route('admin.skripsi')->with('success', 'Skripsi berhasil dihapus.');
    }
}
