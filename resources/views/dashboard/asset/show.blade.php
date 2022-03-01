@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <a href="/dashboard/assets" class="btn btn-primary">Kembali</a> --}}
    <h1 class="mb-3">{{ $assets->name }}</h1>
    {{ Breadcrumbs::render('assets.show', $assets) }}

    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                            @if ($assets->image)
                                <img src="{{ asset('storage/' . $assets->image) }}" class="img-fluid" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" width="200" height="200">
                            @endif
                        <div class="mt-3">
                          <h4>{{ $assets->name }}</h4>
                          <p class="card-text">{!! $assets->description !!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kode</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->code }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kepemilikan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->kph->name }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kategori</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->category->name }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Harga</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->price }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nilai Buku</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->book_value }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Penyusutan Barang</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $assets->depreciation }}
                            </div>
                            </div>
                            <hr>
                        <div class="row">
                    <div class="col-sm-12">
                </div>
            </div>

    {{-- <div class="row justify-content-center">
    <div class="card shadow-sm col-md-8" style="width: 18rem;">
        @if ($assets->image)
                    <img src="{{ asset('storage/' . $assets->image) }}" class="card-img-top p-2" alt="{{ $assets->name }}">
                @else
                    <img src="{{ asset('assets/img/no-image.png') }}" alt="Tidak ada gambar">
                @endif
        <div class="card-body">
          <p class="card-text">{!! $assets->description !!}</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Detail
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ $assets->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Kode</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->code }}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Kepemilikan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->kph->name }}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Kategori</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->category->name }}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Harga</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->price }}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nilai Buku</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->book_value }}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Penyusutan Barang</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $assets->depreciation }}
                    </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div> --}}

    </body>
@endsection