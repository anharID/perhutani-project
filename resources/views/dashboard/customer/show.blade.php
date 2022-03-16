@extends('dashboard.layouts.main')

@section('container')
<body>
    <h1 class="mb-3">Show Customer</h1>
    {{-- {{ Breadcrumbs::render('assets.show', $asset) }} --}}

    <div class="col-md-8">
    {{-- <div class="card shadow"> --}}
        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
            <div class="card-body">
            <div class="col-sm-3">
                <h4 class="mb-0">Detail {{ $customer->nama }}</h4>
            </div>
            <hr>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->code }} --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">No. Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->kph->name }} --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->category->name }} --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Badan/Individual</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->price }} --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Aset dipilih</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->book_value }} --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Penawaran Harga</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->depreciation }} --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Permintaan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- {{ $asset->user->nama }} --}}
                    </div>
                </div>
                {{-- @if ($asset->status)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Disetujui Oleh</h6>
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

</body>
@endsection