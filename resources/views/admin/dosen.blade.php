@extends('layouts.template')

@section('title', 'Manajemen Dosen')


@section('content')
    <div class="container">
        <h2>Manajemen Dosen</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDosenModal">Tambah Dosen</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIDN</th>
                    <th>Jabatan Akademik</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dosen->nama_lengkap }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->jabatan_akademik }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>
                            <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah Dosen -->
        <div class="modal fade" id="addDosenModal" tabindex="-1" aria-labelledby="addDosenModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDosenModalLabel">Tambah Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.dosen.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" required>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan_akademik" class="form-label">Jabatan Akademik</label>
                                <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
