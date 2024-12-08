@extends('layouts.template')

@section('title', 'Semua Skripsi')

@section('content')
    <div class="container">
        <h2>Data Skripsi</h2>
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Skripsi</th>
                    <th>Mahasiswa</th>
                    <th>Pembimbing</th>
                    <th>Prodi</th>
                    <th>Tahun Publikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            {{ $mahasiswa->skripsi->judul_skripsi }}

                        </td>
                        <td>{{ $mahasiswa->nama_lengkap }} <span class="text-muted">{{ $mahasiswa->npm }}</span> </td>
                        <td>{{ $mahasiswa->dosen->nama_lengkap }} <span
                                class="text-muted">{{ $mahasiswa->dosen->nidn }}</span></td>
                        <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                        <td>{{ $mahasiswa->skripsi->tahun_publikasi }}</td>
                        <td>
                            @if ($mahasiswa->skripsi->file_skripsi)
                                <a href="{{ Storage::url($mahasiswa->skripsi->file_skripsi) }}" class="btn btn-sm btn-success"
                                    download>
                                    Download
                                </a>
                            @else
                                <span class="text-muted">Tidak ada file</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $mahasiswas->links() }}
        </div>
    </div>
@endsection
