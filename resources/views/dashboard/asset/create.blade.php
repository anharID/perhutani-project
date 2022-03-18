@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-3">Tambah Asset</h1>
{{ Breadcrumbs::render('assets.create') }}

<div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/assets" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Kode" required autofocus value="{{ old('code') }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Nama Aset</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Aset" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kph" class="form-label">Kepemilikan</label>
                <select name="kph_id" class="form-select" required>
                  <option disabled selected>Kepemilikan</option>
                @foreach ($kphs as $kph)
                  <option value="{{ $kph->id }}">{{ $kph->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="category_id" class="form-label">Pilih Kategori</label>
                <select name="category_id" class="form-select" required>
                  <option disabled selected>Kategori</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga" required value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="year_acquisition" class="form-label">Tahun Perolehan</label>
                <input type="number" name="year_acquisition" class="form-control @error('year_acquisition') is-invalid @enderror" id="year_acquisition" required value="{{ Carbon\Carbon::now()->format('Y'), old('year_acquisition') }}">
                @error('year_acquisition')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="lifetime" class="form-label">Masa Pakai (dalam tahun)</label>
                <input type="number" name="lifetime" class="form-control @error('lifetime') is-invalid @enderror" id="lifetime" required value="{{ 1, old('lifetime') }}">
                @error('lifetime')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label for="book_value" class="form-label">Nilai Buku</label>
                <input type="text" name="book_value" class="form-control @error('book_value') is-invalid @enderror" id="book_value" placeholder="Nilai Buku" required value="{{ old('book_value') }}">
                @error('book_value')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div> --}}
              <div class="form-group">
                <label for="depreciation_year" class="form-label">Penyusutan rata-rata / tahun</label>
                <input type="text" name="depreciation_year" class="form-control @error('depreciation_year') is-invalid @enderror" id="depreciation_year" placeholder="Penyusutan rata-rata pertahun" required value="{{ old('depreciation_year') }}">
                @error('depreciation_year')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="image" class="form-label">Gambar Aset</label>
                <input 
                class="form-control @error('image') is-invalid @enderror" 
                type="file" 
                name="image"
                >
                @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="attachment" class="form-label">File Lampiran</label>
                <input 
                class="form-control @error('attachment') is-invalid @enderror" 
                type="file" 
                name="attachment[]" 
                multiple
                >
                @error('attachment')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description" class="form-label">Deskripsi</label>
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
      </form>
      
      <script>
        document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
        })
      </script>
    
@endsection