@extends('dashboard.layouts.main')

@section('container')
<body>
    <h1 class="mb-3">Show Customer</h1>
    {{-- {{ Breadcrumbs::render('assets.show', $asset) }} --}}

    <div class="col-md-8">
        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
            <div class="card-body">
            <div class="col-sm-3">
                <h4 class="mb-0">Detail {{ $candidate->nama }}</h4>
            </div>
            <hr>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->nama }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">No. Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->no_hp }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->alamat }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Badan/Individual</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->organisasi }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Aset dipilih</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->asset->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Penawaran Harga</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $candidate->penawaran }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Permintaan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {!! $candidate->permintaan !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection