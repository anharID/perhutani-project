@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <a href="/dashboard/assets" class="btn btn-primary">Kembali</a> --}}
    <h1 class="mb-3">{{ $asset->name }}</h1>
    {{ Breadcrumbs::render('approve.show', $asset) }}

    <div class="container">
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
                                <div class="col-sm-3">
                                    <h4 class="mb-0">Detail Aset</h4>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kode</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->code }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kepemilikan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->kph->name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kategori</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->category->name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Harga</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->price }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nilai Buku</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->book_value }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Penyusutan Barang</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->depreciation_year }} / tahun
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ditambahkan oleh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->user->nama }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                            <div class="card-body">
                                <div class="col-auto">
                                    <h4 class="mb-3">File Lampiran</h4>
                                    <hr>
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
                        <div class="col-auto">
                            <form action="/dashboard/approve/assets/{{ $asset->slug }}/approved" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $asset->slug }}">Approve</button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop-{{ $asset->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5">Apakah Anda yakin ingin menyetujui tindakan ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form>
                                                    <button type="button" class="btn btn-secondary col-2" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-danger col-2" data-bs-target="#staticBackdrop-{{ $asset->slug }}">Ya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection