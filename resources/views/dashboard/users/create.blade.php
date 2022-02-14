@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Tambah Data User</h1>
        <form class="row g-3" action="{{ route('user') }}" method="POST">
          @csrf
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Inputkan username" required autofocus value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Inputkan nama" required value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Inputkan email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_karyawan" class="form-label">No. Karyawan</label>
                <input type="text" name="no_karyawan" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" placeholder="Inputkan nomor karyawan" required value="{{ old('no_karyawan') }}">
                @error('no_karyawan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Inputkan nomor hp" required value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Inputkan alamat" required value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-select">
                  <option selected>Inputkan role</option>
                  <option value="Admin">Admin</option>
                  <option value="Supervisor">Supervisor</option>
                  <option value="Operator">Operator</option>
                </select>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Inputkan password" required autocomplete="new-password">
              @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Inputkan konfirmasi password" required autocomplete="new-password">
              @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Tambah User</button>
            </div>
      </form>
    
@endsection