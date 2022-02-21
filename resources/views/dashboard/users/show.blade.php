@extends('dashboard.layouts.main')

@section('container')
<body>
    <a href="/dashboard/users" class="btn btn-primary mb-3">Kembali</a>
    <h1>Hai, {{ $user->nama }}</h1>

    <div class="row">
        <div class="card col-md-3 me-5">
            <div class="card-header">
            <h5>Data Diri</h5>
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <h5>Username</h5>
                    {{ $user->username }}
                </div>
                <div class="list-group-item">
                    <h5>Email</h5>
                    {{ $user->email }}
                </div>
                <div class="list-group-item">
                    <h5>Nama</h5>
                    {{ $user->nama }}
                </div>
                <div class="list-group-item">
                    <h5>No. Karyawan</h5>
                    {{ $user->no_karyawan }}
                </div>
                <div class="list-group-item">
                    <h5>No. Hp</h5>
                    {{ $user->no_hp }}
                </div>
                <div class="list-group-item">
                    <h5>Alamat</h5>
                    {{ $user->alamat }}
                </div>
                <div class="list-group-item">
                    <h5>Role</h5>
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