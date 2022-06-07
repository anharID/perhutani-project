@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Edit Data User</h1>
{{ Breadcrumbs::render('user.edit', $user) }}
<div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/users/{{ $user->username }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" readonly value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama', $user->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_karyawan" class="form-label">No. Karyawan</label>
                <input type="text" name="no_karyawan" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" placeholder="Nomor Karyawan" required value="{{ old('no_karyawan',$user->no_karyawan) }}">
                @error('no_karyawan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Hp" required value="{{ old('no_hp',$user->no_hp) }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat', $user->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="foto" class="form-label">Foto User</label>
                <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" accept="image/*" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
    
@endsection