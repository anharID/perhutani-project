@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">Detail Customer</h1>
    {{ Breadcrumbs::render('approve.customer.show', $customer) }}

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                        <div class="card-body">
                            <div class="col-12">
                                <h4 class="mb-0">About Customer</h4>
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
                                    {{ $customer->organisasi }}
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
                        </div> 
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                        <div class="card-body">
                            <div class="col-12">
                                <h4 class="mb-0">Approval</h4>
                            </div>
                            <hr>
                            <form class="row g-3" action="{{ route('approve.customer.approved', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                <label for="biayasewa" class="form-label">Biaya sewa/bulan</label>
                                <input type="text" name="biayasewa" class="form-control @error('biayasewa') is-invalid @enderror" id="biayasewa" placeholder="Biaya sewa/bulan" required autofocus value="{{ old('biayasewa') }}">
                                @error('biayasewa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggalsewa" class="form-label">Tanggal mulai sewa</label>
                                <input type="date" name="tanggalsewa" class="form-control @error('tanggalsewa') is-invalid @enderror" id="tanggalsewa" placeholder="Tanggal jatuh tempo" required autofocus value="{{ old('tanggalsewa') }}">
                                @error('tanggalsewa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="pks" class="form-label">File Lampiran</label>
                                <input 
                                class="form-control @error('pks') is-invalid @enderror" 
                                type="file" 
                                name="pks"
                                >
                                @error('pks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            <div class="row">
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $customer->slug }}">Approve</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop-{{ $customer->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <button type="submit" class="btn btn-danger col-2" data-bs-target="#staticBackdrop-{{ $customer->slug }}">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
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