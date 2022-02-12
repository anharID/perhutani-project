@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Tambah Asset</h1>
        <form class="row g-3" action="/dashboard/asset" method="POST">
          @csrf
            <div class="col-12">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Inputkan code" required value="{{ old('code') }}">
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
                <label for="category" class="form-label">Kategori</label>
                <select name="category" class="form-select">
                <option selected>Inputkan kategori</option>
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
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Inputkan deskripsi" required value="{{ old('description') }}"></textarea>
                @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Input Data</button>
            </div>
      </form>
    
@endsection