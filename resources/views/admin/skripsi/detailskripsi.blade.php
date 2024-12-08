@extends('layouts.template')

@section('title', 'Detail Skripsi')

@section('content')
    <div class="container">
        <h2>{{ $mahasiswas->skripsi->judul_skripsi }}</h2>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Mahasiswa:</strong> {{ $mahasiswas->mahasiswa->nama_lengkap }}</li>
            <li class="list-group-item"><strong>Prodi:</strong> {{ $mahasiswas->prodi->nama_prodi }}</li>
            <li class="list-group-item"><strong>Pembimbing:</strong> {{ $mahasiswas->dosen->nama_lengkap }}</li>
            <li class="list-group-item"><strong>Tahun Publikasi:</strong> {{ $mahasiswas->skripsi->tahun_publikasi }}</li>
        </ul>
        @if ($skripsi->file_skripsi)
            <a href="{{ Storage::url($skripsi->file_skripsi) }}" class="btn btn-success" download>Download Skripsi</a>
        @else
            <p class="text-muted">Tidak ada file yang tersedia.</p>
        @endif
    </div>
@endsection
