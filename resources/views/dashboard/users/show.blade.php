@extends('dashboard.layouts.main')

@section('container')
<body>
    <a href="/dashboard/users" class="btn btn-primary mb-3">Kembali</a>
    <h1>Hai, {{ $user->nama }}</h1>
    
    {{-- <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4">Nisa</h2>
                            <p>Mahasiswa</p>
                            <i class="far fa-edit fa-2x mb-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="card col-md-3 me-5">
            <div class="text-center mb-3">
                @if ($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}" class="img-responsive img-circle" width="200px" style="border-radius: 100px; -moz-border-radius: 100px;">
                @else
                    <img src="{{ asset('assets/img/foto_profile.png') }}" class="img-responsive img-circle" width="200px" style="border-radius: 100px; -moz-border-radius: 100px;">
                @endif
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    {{ $user->nama }}
                </div>
                <div class="list-group-item">
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
    </div>
</body>
   
@endsection