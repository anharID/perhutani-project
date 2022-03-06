@extends('dashboard.layouts.main')

@section('container')
<body>
    {{-- <a href="/dashboard/users" class="btn btn-primary mb-3">Kembali</a> --}}
    <h1 class="mb-3">Detail User</h1>
    {{ Breadcrumbs::render('user.show', $user) }}
    

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" class="img-responsive rounded-circle" width="200" height="200">
                                @else
                                    <img src="{{ asset('assets/img/foto_profile.png') }}" class="img-responsive rounded-circle" width="200" height="200">
                                @endif
                                    <div class="mt-3">
                                        <h4>{{ $user->nama }}</h4>
                                        <p class="text-secondary mb-1">{{ $user->role }}</p>
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
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->username }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">No. Karyawan</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->no_karyawan }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">No. Hp</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->no_hp }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->alamat }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- <div class="row mt-3">
        <div class="card col-md-3 me-5 mb-5">
            <div class="text-center mb-3">
                @if ($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}" class="img-responsive img-circle" width="200px" style="border-radius: 100px; -moz-border-radius: 100px;">
                @else
                    <img src="{{ asset('assets/img/foto_profile.png') }}" class="img-responsive img-circle" width="200px" style="border-radius: 100px; -moz-border-radius: 100px;">
                @endif
            </div>
            <div class="list-group list-group-flush text-center">
                <div class="list-item">
                <h5>{{ $user->nama }}</h5>
                </div>
                <div class="list-item">
                    {{ $user->role }}
                </div>
            </div>
        </div>

        <div class="card col-md-6">
            <div class="card-header">
            <h5>Data Diri</h5>
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Username</h5>
                    {{ $user->username }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Email</h5>
                    {{ $user->email }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Nama</h5>
                    {{ $user->nama }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>No. Karyawan</h5>
                    {{ $user->no_karyawan }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>No. Hp</h5>
                    {{ $user->no_hp }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Alamat</h5>
                    {{ $user->alamat }}
                </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Role</h5>
                    {{ $user->role }}
                </div>

        </div>
    </div> --}}
</body>
   
@endsection