@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-3">Edit Customer</h1>
    <div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/customer/{{ $customer->slug }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
              <div class="form-group>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama', $customer->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group>
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Hp" required value="{{ old('no_hp',  $customer->no_hp )}}">
                @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group>
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat',  $customer->alamat )}}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group>
                <label for="organisasi" class="form-label">Badan/Individual</label>
                <input type="text" name="organisasi" class="form-control @error('organisasi') is-invalid @enderror" id="organisasi" placeholder="Badan/Individual" required value="{{ old('organisasi',  $customer->organisasi )}}">
                @error('organisasi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              {{-- <div class="form-group>
                <label for="kph" class="form-label">Kepemilikan</label>
                <select name="kph_id" class="form-select">
                  <option disabled selected>Kepemilikan</option>
                  @foreach ($kphs as $kph)
                  @if (old('category', $assets->kph_id) == $kph->id)
                    <option value="{{ $kph->id }}" selected>{{ $kph->name }}</option>
                  @else
                    <option value="{{ $kph->id }}">{{ $kph->name }}</option>
                  @endif
                @endforeach
                </select>
              </div> --}}
              <div class="form-group>
                <label for="asset_id" class="form-label">Pilih Aset</label>
                <select name="asset_id" class="form-select">
                  <option disabled selected>Pilih Aset</option>
                {{-- @foreach ($categories as $category)
                  @if (old('category', $assets->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach --}}
                </select>
              </div>
              <div class="form-group>
                <label for="penawaran" class="form-label">Penawaran Harga</label>
                <input type="text" name="penawaran" class="form-control @error('penawaran') is-invalid @enderror" id="penawaran" placeholder="Penawaran Harga" required value="{{ old('penawaran', $customer->penawaran) }}">
                @error('penawaran')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="permintaan" class="form-label">Permintaan</label>
                <input id="permintaan" type="hidden" name="permintaan" value="{{ old('permintaan', $customer->permintaan) }}">
                <trix-editor input="permintaan"></trix-editor>
              </div>
              <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
      </form>
@endsection