@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-4">Data Asset</h1>
  
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  
  <a href="/dashboard/asset/create" class="btn btn-primary mb-3">Tambah Asset</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Code</th>
        <th>Nama Asset</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Nilai Buku</th>
        <th>Penyusutan Barang</th>
        <th>Deskripsi</th>
      </thead>
      <tbody>
        {{-- @foreach ($asets as $aset)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $aset->code }}</td>
          <td>{{ $aset->name }}</td>
          <td>{{ $aset->category }}</td>
          <td>{{ $aset->price }}</td>
          <td>{{ $aset->book_value }}</td>
          <td>{{ $aset->depreciation }}</td>
          <td>{{ $aset->description }}</td>
          <td>
            <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="#" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <a href="#" class="badge bg-danger"><i class="fas fa-times-circle"></i></a>
          </td>
        </tr>
            
        @endforeach --}}
      </tbody>
      
    </table>
  </div>
    
@endsection