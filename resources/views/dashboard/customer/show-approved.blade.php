@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Detail Customer</h1>
    {{ Breadcrumbs::render('customers.approved.show', $customer) }}

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
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Badan/Individual</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $customer->organisasi }}
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
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Biaya sewa/bulan</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $customer->biayasewa }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Tanggal mulai sewa</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $customer->tanggalsewa }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Disetujui Oleh</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $customer->approve_by }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="col-auto">
                                <h4 class="mb-3">File Lampiran</h4>
                                <hr>
                                <form action="/dashboard/customers/approved/{{ $customer->id }}/download" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-link">{{ $customer->pks }}</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
@endsection