@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">{{ $customer->nama }}</h1>
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
                <div class="col-md-8">
                    <div class="row">
                        <div class="card mb-3 shadow-sm p-3 bg-body rounded">
                            <div class="card-body">
                                {{-- <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td>{{ $customer->nama }}</td>
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No. Hp</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- {{ $asset->kph->name }} --}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $customer->alamat }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Badan/Individual</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- {{ $asset->price }} --}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Aset</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- {{ $customer->asset->name }} --}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Penawaran Harga</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $customer->penawaran }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Permintaan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- {{ $asset->user->nama }} --}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ditambahkan Oleh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- {{ $customer->user->nama }} --}}
                                    </div>
                                </div>
                                <hr>
                                {{-- @if ($asset->status)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Disetujui oleh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $asset->approve_by }}
                                    </div>
                                </div>
                                <hr>
                                @endif --}}
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="col-auto">
                                <form action="/dashboard/customer/approve/{{ $customer->slug }}/approved" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin melanjutkan?')">Approve</button>
                                </form>
                            </div>
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