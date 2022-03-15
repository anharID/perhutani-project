@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Tambah Customer</h1>
{{-- {{ Breadcrumbs::render('assets.create') }} --}}

<div class="card shadow">
        <form class="row g-3 p-3">
          @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Hp" required value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="organisasi" class="form-label">Badan/Individual</label>
                <select name="organisasi" class="form-select" required>
                  <option disabled selected>Badan/Individual</option>
                {{-- @foreach ($kphs as $kph)
                  <option value="{{ $kph->id }}">{{ $kph->name }}</option>
                @endforeach --}}
                </select>
              </div>
              <div class="form-group">
                <label for="category_id" class="form-label">Pilih Aset</label>
                <select name="select_box" class="form-select" id="select_box">
                  <option value="">Aset</option>
                {{-- @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach --}}
                </select>
              </div>
              <div class="form-group">
                <label for="penawaran" class="form-label">Penawaran Harga</label>
                <input type="text" name="penawaran" class="form-control @error('penawaran') is-invalid @enderror" id="penawaran" placeholder="Penawaran Harga" required value="{{ old('penawaran') }}">
                @error('penawaran')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="permintaan" class="form-label">Permintaan</label>
                <input id="permintaan" type="hidden" name="permintaan" value="{{ old('permintaan') }}">
                <trix-editor input="permintaan"></trix-editor>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
      </form>
@endsection