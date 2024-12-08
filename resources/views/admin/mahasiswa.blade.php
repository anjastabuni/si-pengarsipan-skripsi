@extends('layouts.template')

@section('title', 'Manajemen Mahasiswa')

@section('content')
    <div class="container">
        <h2>Manajemen Mahasiswa</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMahasiswaModal">Tambah
            Mahasiswa</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NPM</th>
                    <th>Tahun Masuk</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mahasiswa->nama_lengkap }}</td>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->tahun_masuk }}</td>
                        <td>{{ $mahasiswa->kontak }}</td>
                        <td>
                            <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah Mahasiswa -->
        <div class="modal fade" id="addMahasiswaModal" tabindex="-1" aria-labelledby="addMahasiswaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMahasiswaModalLabel">Tambah Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" class="form-control" id="npm" name="npm" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak">
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Dosen Pembimbing</label>
                                <select class="form-control" id="dosen_id" name="dosen_id" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosenItem)
                                        <option value="{{ $dosenItem->id }}">{{ $dosenItem->dosen_id }} -
                                            {{ $dosenItem->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Program Studi</label>
                                <select class="form-control" id="prodi_id" name="prodi_id" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach ($prodis as $prodiItem)
                                        <option value="{{ $prodiItem->id }}">{{ $prodiItem->prodi_id }} -
                                            {{ $prodiItem->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
