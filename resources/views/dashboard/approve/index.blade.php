@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">Approve Asset</h1>
{{ Breadcrumbs::render('approve') }}

<div class="card shadow">
  
{{-- @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif --}}

<div class="table-responsive p-3">
  <table id="example" class="table table-striped table-bordered table-sm table-hover">
    <thead>
      <th>No.</th>
      <th>Kode</th>
      <th>Nama Aset</th>
      <th>Kategori</th>
      <th>Status</th>
      <th>Ditambahkan Oleh</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      @foreach ($assets as $asset)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $asset->code }}</td>
          <td>{{ $asset->name }}</td>
          <td>{{ $asset->category->name }}</td>
          @if ($asset->status)
          <td><span class="badge bg-success">Sudah</span></td>
          @else
          <td><span class="badge bg-danger">Belum</span></td>
          @endif
          <td>{{ $asset->user->nama }}</td>
          <td>
            <a href="/dashboard/approve/{{ $asset->slug }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
          </td>
        </tr>
            
        @endforeach
    </tbody>
    
  </table>
</div>
</div>
    
@endsection