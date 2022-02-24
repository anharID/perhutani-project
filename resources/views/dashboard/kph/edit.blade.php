@extends('dashboard.layouts.main')
@section('container')
      <h1 class="mb-4">Edit Data KPH</h1>
      <div class="card shadow">
        <form class="row g-3 p-3" action="/dashboard/kph/{{ $kph->id }}" method="POST">
          @method('put')
          @csrf
            <div class="col-12">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Inputkan code" required value="{{ old('code', $kph->code) }}">
                @error('code')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama KPH</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inputkan nama KPH" required value="{{ old('name', $kph->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Alamat KPH</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Inputkan alamat KPH" required value="{{ old('address', $kph->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
              </div>
            <div class="col-md-6">
              <label for="lu_coordinate" class="form-label">Koordinat LU</label>
              <input type="text" name="lu_coordinate" class="form-control @error('lu_coordinate') is-invalid @enderror" id="lu_coordinate" placeholder="Inputkan koordinat LU" required value="{{ old('lu_coordinate', $kph->lu_coordinate) }}">
              @error('lu_coordinate')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="ls_coordinate" class="form-label">Koordinat LS</label>
              <input type="text" name="ls_coordinate" class="form-control @error('ls_coordinate') is-invalid @enderror" id="ls_coordinate" placeholder="Inputkan koordinat LS" required value="{{ old('ls_coordinate', $kph->ls_coordinate) }}">
              @error('ls_coordinate')
                    <div class="invalid-feedback">
                      {{ 'Form tidak boleh kosong!' }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
      </form>
@endsection