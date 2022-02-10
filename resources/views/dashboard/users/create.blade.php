@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Tambah Data User</h1>
        <form class="row g-3" action="/dashboard/user" method="POST">
          @csrf
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Inputkan username" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inputkan nama" required value="{{ old('code') }}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Inputkan email" required value="{{ old('code') }}">
                @error('email')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_karyawan" class="form-label">No. Karyawan</label>
                <input type="text" name="no_karyawan" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" placeholder="Inputkan no_karyawan" required value="{{ old('code') }}">
                @error('no_karyawan')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Inputkan no_hp" required value="{{ old('code') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Inputkan alamat" required value="{{ old('code') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="role" class="form-label">Role</label>
                <select class="form-select">
                <option selected>Inputkan role</option>
                <option value="1">Admin</option>
                <option value="2">Supervisor</option>
                <option value="3">Operator</option>
                </select>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Inputkan password" required value="{{ old('code') }}">
              @error('password')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="confirm_password" class="form-label">Konfirmasi Password</label>
              <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Inputkan konfirmasi password" required value="{{ old('code') }}">
              @error('confirm_password')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Tambah User</button>
            </div>
      </form>
    
@endsection