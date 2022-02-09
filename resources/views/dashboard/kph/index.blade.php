@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid p-5">
  <h1 class="mb-4">Data KPH</h1>
  
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  
  <a href="/dashboard/kph/create" class="btn btn-primary mb-3">New</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Code</th>
        <th>Nama KPH</th>
        <th>Alamat KPH</th>
        <th>Koordinat LU</th>
        <th>Koordinat LS</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($kphs as $kph)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kph->code }}</td>
          <td>{{ $kph->name }}</td>
          <td>{{ $kph->address }}</td>
          <td>{{ $kph->lu_coordinate }}</td>
          <td>{{ $kph->ls_coordinate }}</td>
          <td>
            <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="#" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <a href="#" class="badge bg-danger"><i class="fas fa-times-circle"></i></a>
          </td>
        </tr>
            
        @endforeach
      </tbody>
      
    </table>
  </div>
</div>
    
@endsection