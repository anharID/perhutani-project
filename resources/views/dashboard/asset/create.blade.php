@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Tambah Asset</h1>
        <form class="row g-3" action="/dashboard/assets" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="col-12">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Inputkan code" required autofocus value="{{ old('code') }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama Asset</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inputkan nama aset" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="kph" class="form-label">Kepemilikan</label>
                <select name="kph_id" class="form-select" required>
                @foreach ($kphs as $kph)
                  <option value="{{ $kph->id }}">{{ $kph->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="col-12">
                <label for="category_id" class="form-label">Pilih Kategori</label>
                <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="col-12">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Inputkan harga" required value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="book_value" class="form-label">Nilai Buku</label>
                <input type="text" name="book_value" class="form-control @error('book_value') is-invalid @enderror" id="book_value" placeholder="Inputkan nilai buku" required value="{{ old('book_value') }}">
                @error('book_value')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="depreciation" class="form-label">Penyusutan Barang</label>
                <input type="text" name="depreciation" class="form-control @error('depreciation') is-invalid @enderror" id="depreciation" placeholder="Inputkan penyusutan barang" required value="{{ old('depreciation') }}">
                @error('depreciation')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Gambar Asset</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="description" class="form-label">Deskripsi</label>
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Input Data</button>
              </div>
      </form>
      
      <script>
        document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
        })
      </script>
    
@endsection