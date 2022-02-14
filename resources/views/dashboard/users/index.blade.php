@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-4">Data Users</h1>
  
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  
  <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah User</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No. Karyawan</th>
        <th>No. Hp</th>
        <th>Alamat</th>
        <th>Role</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->nama }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->no_karyawan }}</td>
          <td>{{ $user->no_hp }}</td>
          <td>{{ $user->alamat }}</td>
          <td>{{ $user->role }}</td>
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
    
@endsection