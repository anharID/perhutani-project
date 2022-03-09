@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Data Asset</h1>
{{ Breadcrumbs::render('assets') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <div class="card shadow">
  <div class="table-responsive p-3">
  <div class="col-12">
    <a href="/dashboard/assets/create" class="btn btn-primary mb-4">Tambah Asset</a>
    <a href="{{ route('trash') }}" class="btn btn-danger mb-4">Trash</a>
  </div>
    <table id="example" class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama Aset</th>
        <th>Kategori</th>
        <th>Ditambahkan oleh</th>
        <th>Status Approval</th>
        <th>Disetujui oleh</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($assets as $asset)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $asset->code }}</td>
          <td>{{ $asset->name }}</td>
          <td>{{ $asset->category->name }}</td>
          <td>{{ $asset->user->nama }}</td>
          @if ($asset->status)
          <td><span class="badge bg-success">Sudah</span></td>
          <td>{{ $asset->approve_by }}</td>
          @else
          <td><span class="badge bg-danger">Belum</span></td>
          <td><span>-</span></td>
          @endif
          
          
          
          <td>
            <a href="/dashboard/assets/{{ $asset->slug }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/assets/{{ $asset->slug}}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <form action="/dashboard/assets/{{ $asset->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-times-circle"></i></button>
            </form>
          </td>
        </tr>
            
        @endforeach
      </tbody>
      
    </table>
  </div>
    
@endsection