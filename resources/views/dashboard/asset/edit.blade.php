@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Edit Asset</h1>
{{ Breadcrumbs::render('assets.edit', $assets) }}
<div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/assets/{{ $assets->slug }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
              <div class="col-12">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Kode" required value="{{ old('code', $assets->code) }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama Aset</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Aset" required value="{{ old('name',  $assets->name )}}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
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
              </div>
              <div class="col-12">
                <label for="category" class="form-label">Kategori</label>
                <select name="category_id" class="form-select">
                  <option disabled selected>Kategori</option>
                @foreach ($categories as $category)
                  @if (old('category', $assets->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
                </select>
              </div>
              <div class="col-12">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga" required value="{{ old('price', $assets->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="book_value" class="form-label">Nilai Buku</label>
                <input type="text" name="book_value" class="form-control @error('book_value') is-invalid @enderror" id="book_value" placeholder="Nilai Buku" required value="{{ old('book_value', $assets->book_value) }}">
                @error('book_value')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="depreciation" class="form-label">Penyusutan Barang</label>
                <input type="text" name="depreciation" class="form-control @error('depreciation') is-invalid @enderror" id="depreciation" placeholder="Penyusutan Barang" required value="{{ old('depreciation', $assets->depreciation) }}">
                @error('depreciation')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Gambar Asset</label>
                <input type="hidden" name="oldImage" value="{{ $assets->image }}">
                <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="description" class="form-label">Deskripsi</label>
                <input id="description" type="hidden" name="description" value="{{ old('description', $assets->description) }}">
                <trix-editor input="description"></trix-editor>
              </div>
              <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
      </form>

      <script>
        document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
        })
      </script>
    
@endsection