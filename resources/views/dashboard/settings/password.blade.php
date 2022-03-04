@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-4">Ganti Password</h1>

    <div class="card shadow">
        <form class="p-3" action="{{ route('password.update') }}" method="POST">
          @csrf
          <div class="row g-3">
                <div class="col-sm-4 ">
                    <label for="old_password" class="form-label">Password Lama</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Masukkan password lama Anda" required>
                    @error('old_password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col-sm-4 ">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control " id="new_password" placeholder="Masukkan password baru Anda" required>
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-4 ">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" id="name" placeholder="Masukkan kembali password baru Anda" required>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
            
@endsection