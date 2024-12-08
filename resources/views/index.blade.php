@section('content')
    <div class="row my-5">
        <div class="col-md-12 text-center py-5">
            <h1>Selamat Datang di Sistem Pengarsipan Skripsi</h1>
            <p class="lead">Cari dan temukan skripsi dengan mudah menggunakan fitur pencarian kami.</p>
            <form action="/search" method="GET" class="d-flex justify-content-center">
                <input type="text" class="form-control w-50 me-2 py-2" name="query" placeholder="Cari judul, penulis, atau dosen..." required>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <div class="row mt-5 mb-2 ">
        <h3>Skripsi</h3>
        @if($skripsi->isEmpty())
            <p>Tidak ada hasil pencarian.</p>
        @else
            @foreach($skripsi as $item)
                <div class="col-xl-7 col-lg-10 col-md-12 border-bottom pb-2 pt-4">
                    <h5>{{ $item->judul_skripsi }}</h5>
                    <h6 class="mb-2 text-muted">Penulis: {{ $item->penulis_nama }}</h6>
                    <p>{{ Str::limit($item->file_skripsi, 150) }}</p>
                    <a href="#" class="card-link">Download</a>
                    <a href="#" class="card-link">Details</a>
                </div>
            @endforeach
        @endif
    </div>
@endsection