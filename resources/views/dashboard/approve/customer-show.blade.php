@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">Detail Customer</h1>
    {{-- {{ Breadcrumbs::render('assets.show', $asset) }} --}}

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                {{-- <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                            @if ($asset->image)
                                <img src="{{ asset('storage/' . $asset->image) }}" class="img-fluid" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" width="200" height="200">
                            @endif
                        <div class="mt-3">
                          <h4>{{ $asset->name }}</h4>
                          <p class="card-text">{!! $asset->description !!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <div class="col-md-6">
                    {{-- <div class="row"> --}}
                        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                    <h4 class="mb-0">Biodata Customer</h4>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->nama }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">No. Hp</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->no_hp }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->alamat }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Badan/Individual</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->alamat }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Aset</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->asset->name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Penawaran Harga</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->penawaran }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Permintaan</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {!! $customer->permintaan !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Ditambahkan Oleh</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        {{ $customer->user->nama }}
                                    </div>
                                </div>
                                {{-- @if ($asset->status)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Disetujui oleh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->approve_by }}
                                    </div>
                                </div>
                                @endif --}}
                            </div> 
                        </div>
                    {{-- </div> --}}
                </div>

                <div class="col-md-6">
                        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                    <h4 class="mb-0">Approval</h4>
                                </div>
                                <hr>
                                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="code" class="form-label">Biaya sewa/bulan</label>
                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Biaya sewa/bulan" required autofocus value="{{ old('code') }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code" class="form-label">Tanggal mulai sewa</label>
                                    <input type="date" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Tanggal jatuh tempo" required autofocus value="{{ old('code') }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="attachment" class="form-label">File Lampiran</label>
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

                                <div class="row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin melanjutkan?')">Approve</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>

                
                {{-- <div class="row">
                    <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="col-auto">
                                <h4 class="mb-3">FIle Lampiran</h4>
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
                </div> --}}
            </div>
        </div>
    </div>
</body>
@endsection