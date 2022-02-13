@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Edit Asset</h1>
        <form class="row g-3" action="/dashboard/assets/{{ $asset->slug }}" method="POST">
          @method('put')
          @csrf
            <div class="col-12">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Inputkan code" required value="{{ old('code', $asset->code)  }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama Asset</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inputkan nama aset" required value="{{ old('name',  $asset->name )}}">
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
                  @if (old('category', $asset->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Inputkan harga" required value="{{ old('price', $asset->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="book_value" class="form-label">Nilai Buku</label>
                <input type="text" name="book_value" class="form-control @error('book_value') is-invalid @enderror" id="book_value" placeholder="Inputkan nilai buku" required value="{{ old('book_value', $asset->book_value) }}">
                @error('book_value')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="depreciation" class="form-label">Penyusutan Barang</label>
                <input type="text" name="depreciation" class="form-control @error('depreciation') is-invalid @enderror" id="depreciation" placeholder="Inputkan penyusutan barang" required value="{{ old('depreciation', $asset->depreciation) }}">
                @error('depreciation')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Inputkan deskripsi" required>{{ old('description', $asset->description) }}</textarea>
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