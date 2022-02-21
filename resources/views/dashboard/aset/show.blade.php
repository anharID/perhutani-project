@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <img src="{{ asset('storage/' . $assets->image) }}" alt="{{ $assets->name }} " class="img-fluid mt-3" width="200px" height="200px">
    <br>
    <a href="{{ asset('storage/' . $assets->image) }}"> lihat gambar</a>
    <br>
    {{ $assets->description }} --}}
    
    <a href="/dashboard/assets" class="btn btn-primary">Kembali</a>
    <h1 class="text-center mb-3">{{ $assets->name }}</h1>
    <div class="row justify-content-center">
            <div class="card shadow-sm col-md-8">
                <img src="{{ asset('storage/' . $assets->image) }}" class="card-img-top p-2" alt="{{ $assets->name }}">
                <div class="card-body">
                  
                  <p class="card-text">{!! $assets->description !!}</p>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <h5>Kode</h5>
                        {{ $assets->code }}
                    </div>
                    <div class="list-group-item">
                        <h5>Kategori</h5>
                        {{ $assets->category->name }}
                    </div>
                    <div class="list-group-item">
                        <h5>Harga</h5>
                        {{ $assets->price }}
                    </div>
                    <div class="list-group-item">
                        <h5>Nilai Buku</h5>
                        {{ $assets->book_value }}
                    </div>
                    <div class="list-group-item">
                        <h5>Penyusutan Barang</h5>
                        {{ $assets->depreciation }}
                    </div>
                </div>
              </div>

        </div>
    </body>
@endsection