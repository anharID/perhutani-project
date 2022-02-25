@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <a href="/dashboard/assets" class="btn btn-primary">Kembali</a> --}}
    <h1 class="mb-3">{{ $assets->name }}</h1>
    {{ Breadcrumbs::render('assets.show', $assets) }}
    <div class="row justify-content-center">
    <div class="card shadow-sm col-md-8" style="width: 18rem;">
        @if ($assets->image)
                    <img src="{{ asset('storage/' . $assets->image) }}" class="card-img-top p-2" alt="{{ $assets->name }}">
                @else
                    <img src="{{ asset('assets/img/no-image.png') }}" alt="Tidak ada gambar">
                @endif
        <div class="card-body">
          <p class="card-text">{!! $assets->description !!}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

    {{-- <div class="row justify-content-center">
            <div class="card shadow-sm col-md-8">
                @if ($assets->image)
                    <img src="{{ asset('storage/' . $assets->image) }}" class="card-img-top p-2" alt="{{ $assets->name }}">
                @else
                    <img src="{{ asset('assets/img/no-image.png') }}" alt="Tidak ada gambar">
                @endif
                <div class="card-body">
                  
                  <p class="card-text">{!! $assets->description !!}</p>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <h5>Kode</h5>
                        {{ $assets->code }}
                    </div>
                    <div class="list-group-item">
                        <h5>Kepemilikan</h5>
                        {{ $assets->kph->name }}
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

        </div> --}}
    </body>
@endsection