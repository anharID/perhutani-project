@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <a href="/dashboard/assets" class="btn btn-primary">Kembali</a> --}}
    <h1 class="mb-3">{{ $assets->name }}</h1>
    {{ Breadcrumbs::render('approve.show', $assets) }}

    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center">
                            @if ($assets->image)
                                <img src="{{ asset('storage/' . $assets->image) }}" class="img-fluid" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" width="200" height="200">
                            @endif
                        <div class="mt-3">
                          <h4 class="text-center">{{ $assets->name }}</h4>
                          <p class="card-text">{!! $assets->description !!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 mb-4 bg-body rounded">
                            <div class="card-body">
                                <h4 class="mb-3">Detail Aset</h4>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-auto">
                                    <h4 class="mb-3">Approval</h4>
                                    <form action="/dashboard/approve/{{ $assets->slug }}/approved" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="attachment" class="form-label">Silahkan masukan file lampiran</label>
                                            <input 
                                            class="form-control @error('attachment') is-invalid @enderror" 
                                            type="file" 
                                            name="attachment[]" 
                                            multiple
                                            >
                                            @error('attachment')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin melanjutkan?')">Approve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection