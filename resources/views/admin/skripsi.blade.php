@extends('layouts.template')

@section('title', 'Manajemen Skripsi')

@section('content')
    <div class="container">
        <h2>Manajemen Skripsi</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSkripsiModal">Tambah Skripsi</button>
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tahun Publikasi</th>
                    <th>Jenis Dokumen</th>
                    <th>Lokasi Fisik</th>
                    <th>File Skripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skripsis as $index => $skripsi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $skripsi->judul_skripsi }}</td>
                        <td>{{ $skripsi->deskripsi }}</td>
                        <td>{{ $skripsi->tahun_publikasi }}</td>
                        <td>{{ $skripsi->jenis_dokumen }}</td>
                        <td>{{ $skripsi->lokasi_fisik }}</td>
                        <td>
                            @if ($skripsi->file_skripsi)
                                <a href="{{ Storage::url($skripsi->file_skripsi) }}" class="btn btn-sm btn-success" download>
                                    Download
                                </a>
                            @else
                                <span>Tidak ada file</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.skripsi.destroy', $skripsi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah Skripsi -->
        <div class="modal fade" id="addSkripsiModal" tabindex="-1" aria-labelledby="addSkripsiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSkripsiModalLabel">Tambah Data Skripsi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.skripsi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="judul_skripsi" class="form-label">Judul Skripsi</label>
                                        <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun_publikasi" class="form-label">Tahun Publikasi</label>
                                        <input type="number" class="form-control" id="tahun_publikasi"
                                            name="tahun_publikasi" min="1900" max="{{ date('Y') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jenis_dokumen" class="form-label">Jenis Dokumen</label>
                                        <select class="form-select" id="jenis_dokumen" name="jenis_dokumen" required>
                                            <option value="Skripsi">Skripsi</option>
                                            <option value="Tesis">Tesis</option>
                                            <option value="Disertasi">Disertasi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="file_skripsi" class="form-label">File Skripsi (PDF)</label>
                                        <input type="file" class="form-control" id="file_skripsi" name="file_skripsi"
                                            accept=".pdf" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi_fisik" class="form-label">Lokasi Fisik (Opsional)</label>
                                        <input type="text" class="form-control" id="lokasi_fisik" name="lokasi_fisik">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mahasiswa_id" class="form-label">Mahasiswa / Penulis</label>
                                        <select class="form-select" id="mahasiswa_id" name="mahasiswa_id" required>
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($mahasiswas as $mahasiswaItem)
                                                <option value="{{ $mahasiswaItem->id }}">
                                                    {{ $mahasiswaItem->mahasiswa_id }} -
                                                    {{ $mahasiswaItem->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
