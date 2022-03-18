@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Edit Asset</h1>
{{ Breadcrumbs::render('assets.edit', $assets) }}
<div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/assets/{{ $assets->slug }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
              <div class="form-group">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Kode" required value="{{ old('code', $assets->code) }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Nama Aset</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Aset" required value="{{ old('name',  $assets->name )}}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kph" class="form-label">Kepemilikan</label>
                <select name="kph_id" class="form-select">
                  <option disabled selected>Kepemilikan</option>
                  @foreach ($kphs as $kph)
                  @if (old('kph_id', $assets->kph_id) == $kph->id)
                    <option value="{{ $kph->id }}" selected>{{ $kph->name }}</option>
                  @else
                    <option value="{{ $kph->id }}">{{ $kph->name }}</option>
                  @endif
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="category" class="form-label">Kategori</label>
                <select name="category_id" class="form-select">
                  <option disabled selected>Kategori</option>
                @foreach ($categories as $category)
                  @if (old('category_id', $assets->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga" required value="{{ old('price', $assets->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="year_acquisition" class="form-label">Tahun Perolehan</label>
                <input type="number" name="year_acquisition" class="form-control @error('year_acquisition') is-invalid @enderror" id="year_acquisition" required value="{{ old('year_acquisition', $assets->year_acquisition) }}">
                @error('year_acquisition')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="lifetime" class="form-label">Masa Pakai (dalam tahun)</label>
                <input type="number" name="lifetime" class="form-control @error('lifetime') is-invalid @enderror" id="lifetime" required value="{{ old('lifetime', $assets->lifetime) }}">
                @error('lifetime')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label for="book_value" class="form-label">Nilai Buku</label>
                <input type="text" name="book_value" class="form-control @error('book_value') is-invalid @enderror" id="book_value" placeholder="Nilai Buku" required value="{{ old('book_value', $assets->book_value) }}">
                @error('book_value')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div> --}}
              <div class="form-group">
                <label for="depreciation_year" class="form-label">Penyusutan Barang</label>
                <input type="text" name="depreciation_year" class="form-control @error('depreciation_year') is-invalid @enderror" id="depreciation_year" placeholder="Penyusutan Barang" required value="{{ old('depreciation_year', $assets->depreciation_year) }}">
                @error('depreciation_year')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="image" class="form-label">Gambar Asset</label>
                <input type="hidden" name="oldImage" value="{{ $assets->image }}">
                <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="attachment" class="form-label">File Lampiran</label>
                @for ($i = 0; $i < $count; $i++)
                  <input type="text" 
                  name="oldAttachment[{{ $i }}]" 
                  value=" {{ $assets->attachments[$i]->path }}"
                  >
                @endfor
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