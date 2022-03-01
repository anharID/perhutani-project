@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Tambah Data User</h1>
{{ Breadcrumbs::render('user.create') }}
<div class="card shadow">
        <form class="row g-3 p-3" action="{{ route('user') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required autofocus value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_karyawan" class="form-label">No. Karyawan</label>
                <input type="text" name="no_karyawan" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" placeholder="Nomor Karyawan" required value="{{ old('no_karyawan') }}">
                @error('no_karyawan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Hp" required value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="role" class="form-label">Pilih Role</label>
                <input name="role" type="hidden" class="form-control @error('alamat') is-invalid @enderror">
                <select name="role" class="form-select">
                  <option disabled selected>Role</option>
                  <option value="Admin">Admin</option>
                  <option value="Supervisor">Supervisor</option>
                  <option value="Operator">Operator</option>
                </select>
                @error('role')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
              <label for="foto" class="form-label">Foto User</label>
              <input class="form-control @error('foto') is-invalid @enderror" type="file" accept="image/*" id="foto" name="foto">
              @error('foto')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required autocomplete="new-password">
              @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Konfirmasi Password" required autocomplete="new-password">
              @error('password')
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