@extends('layouts.template')

@section('title', 'Manajemen Program Studi')


@section('content')
    <div class="container">
        <h2>Manajemen Program Studi</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDosenModal">Tambah Prodi</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode </th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodis as $index => $prodi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $prodi->kode_prodi }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                        <td>
                            <form action="{{ route('admin.prodi.destroy', $prodi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah prodi -->
        <div class="modal fade" id="addDosenModal" tabindex="-1" aria-labelledby="addDosenModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDosenModalLabel">Tambah Program Studi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.prodi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Prodi</label>
                                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Prodi</label>
                                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Di Fakultas</label>
                                <select class="form-control" id="kode_fakultas" name="kode_fakultas" required>
                                    <option value="">Pilih Fakultas</option>
                                    @foreach ($fakultas as $fakultasItem)
                                        <option value="{{ $fakultasItem->id }}">{{ $fakultasItem->kode_fakultas }} -
                                            {{ $fakultasItem->nama_fakultas }}</option>
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
