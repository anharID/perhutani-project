@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Tambah Customer</h1>
{{-- {{ Breadcrumbs::render('assets.create') }} --}}

<div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/customers/candidates" method="post" >
          @csrf
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Hp" onkeypress="return hanyaAngka(event)" required value="{{ old('no_hp') }}">
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
                <input type="text" name="organisasi" id="organisasi" class="form-control @error('organisasi') is-invalid @enderror" placeholder="Badan/Individual" required value="{{ old('organisasi') }}">
              </div>
              <div class="form-group">
                <label for="asset_id" class="form-label">Pilih Aset</label>
                <select name="asset_id" class="form-select" id="select_box">
                  <option disabled selected>Aset</option>
                  @foreach ($assets as $asset)
                    <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="penawaran" class="form-label">Penawaran Harga</label>
                <input type="text" name="penawaran" class="form-control @error('penawaran') is-invalid @enderror" id="penawaran" placeholder="Penawaran Harga" onkeypress="return hanyaAngka(event)" required value="{{ old('penawaran') }}">
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
</div>

<script>
  function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
</script>

@endsection