@extends('dashboard.layouts.main')

@section('container')
<body>
    <h1 class="mb-3">{{ $customer->nama }}</h1>

    {{-- <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center">
                            @if ($asset->image)
                                <img src="{{ asset('storage/' . $asset->image) }}" class="img-fluid" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" width="200" height="200">
                            @endif
                        <div class="mt-3">
                          <h4 class="text-center">{{ $asset->name }}</h4>
                          <p class="card-text">{!! $asset->description !!}</p>
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
                                        {{ $asset->code }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kepemilikan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->kph->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kategori</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->category->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Harga</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->price }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nilai Buku</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->book_value }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Penyusutan Barang</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->depreciation }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ditambahkan oleh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->user->nama }}
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                            <div class="card-body">
                                <div class="col-auto">
                                    <h4 class="mb-3">File Lampiran</h4>
                                    @for ($i = 0; $i <$count ; $i++)
                                    <ul>
                                        <li>
                                            <form action="{{ route('download',  $asset->attachments[$i]->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-link">{{ $asset->attachments[$i]->filename }}</button>
                                            
                                            </form>
                                        </li>
                                    </ul>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-auto">
                                    <form action="/dashboard/asset/approve/{{ $asset->slug }}/approved" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin melanjutkan?')">Approve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</body>
@endsection