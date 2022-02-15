@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-4">Data KPH</h1>
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <a href="/dashboard/kph/create" class="btn btn-primary mb-3">Tambah Data</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama KPH</th>
        <th>Alamat KPH</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($kphs as $kph)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kph->code }}</td>
          <td>{{ $kph->name }}</td>
          <td>{{ $kph->address }}</td>
          <td>
            <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/kph/{{ $kph->id }}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <form action="/dashboard/kph/{{ $kph->id }}" method="post" class="d-inline">
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