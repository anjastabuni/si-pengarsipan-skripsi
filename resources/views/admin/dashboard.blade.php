@extends('layouts.template')

@section('title', 'Dashboard Admin')


@section('content')
    <div class="container">
        <h2>Selamat Datang, Admin</h2>
        <p class="lead">Kelola data sistem dengan mudah menggunakan menu di samping.</p>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-book"></i> Total Skripsi</h5>
                        <p class="card-text">150 Skripsi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Total Dosen</h5>
                        <p class="card-text">50 Pengguna</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-chart-bar"></i> Statistik Hari Ini</h5>
                        <p class="card-text">10 Pencarian</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
