@extends('dashboard.layouts.main')

@section('container')

<h1 class="mb-3">Asset Terhapus</h1>
{{ Breadcrumbs::render('assets.trash') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <form action="/dashboard/assets/delete" method="post" class="d-inline">
    @method('post')
    @csrf
    <button class="btn btn-danger mb-3" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus Semua</button>
  </form>
  {{-- <form action="/dashboard/assets/restore" method="post" class="d-inline">
    @method('post')
    @csrf
    <button class="btn btn-primary mb-3">Restore Semua</button>
  </form> --}}
  <a href="/dashboard/assets/" class="btn btn-secondary mb-3">Back</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Code</th>
        <th>Nama Asset</th>
        <th>Kategori</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($assets as $asset)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $asset->code }}</td>
          <td>{{ $asset->name }}</td>
          <td>{{ $asset->category->name }}</td>
          <td>
            <form action="/dashboard/assets/restore/{{ $asset->slug }}" method="post" class="d-inline">
              @method('post')
              @csrf
              <button class="badge bg-info border-0"><i class="fas fa-undo"></i></button>
            </form>
            <form action="/dashboard/assets/delete/{{ $asset->slug }}" method="post" class="d-inline">
              @method('post')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
            
        @endforeach
      </tbody>
      
    </table>
  </div>
    
@endsection