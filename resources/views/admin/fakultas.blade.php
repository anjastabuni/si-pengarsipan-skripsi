@extends('layouts.template')

@section('title', 'Manajemen Fakultas')


@section('content')
    <div class="container">
        <h2>Manajemen Fakultas</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDosenModal">Tambah Fakultas</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fakultass as $index => $fakultas)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fakultas->nama_fakultas }}</td>
                        <td>
                            <form action="{{ route('admin.fakultas.destroy', $fakultas->id) }}" method="POST">
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
                        <h5 class="modal-title" id="addDosenModalLabel">Tambah Fakultas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.fakultas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
