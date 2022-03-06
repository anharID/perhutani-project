@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-3">User Dinonaktifkan</h1>
  {{ Breadcrumbs::render('user.nonaktif') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <div class="card shadow"> 
  <div class="table-responsive p-3">
  <div class="col-12">
    <a href="/dashboard/users" class="btn btn-secondary mb-4">Back</a>
  </div>
    <table id="example" class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>No. Karyawan</th>
        <th>No. HP</th>
        <th>Alamat</th>
        <th>Dinonaktifkan</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          @if ($user->foto)
            <td><img src="{{ asset('storage/' . $user->foto) }}" class="img-fluid" width="100"></td>
          @else
            <td><img src="{{ asset('assets/img/foto_profile.png') }}" class="img-fluid rounded-circle" width="100"></td>
          @endif
          <td>{{ $user->nama }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          <td>{{ $user->no_karyawan }}</td>
          <td>{{ $user->no_hp }}</td>
          <td>{{ $user->alamat }}</td>
          <td>{{ Carbon\Carbon::parse($user->deleted_at)->diffForHumans() }}</td>
          <td>
            <form action="/dashboard/users/{{ $user->username }}/restore" method="post" class="d-inline">
              @method('post')
              @csrf
              <button class="badge bg-info border-0" onclick="return confirm('Tindakan ini akan mengaktifkan user kembali, yakin ingin melanjutkan?')">Aktifkan</button>
            </form>
          </td>
          
        </tr>
            
        @endforeach
      </tbody>
    </table>
    
  </div>
    
@endsection