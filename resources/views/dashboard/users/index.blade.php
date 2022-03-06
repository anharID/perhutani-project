@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-3">Data Users</h1>
  {{ Breadcrumbs::render('user') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <div class="card shadow"> 
  <div class="table-responsive p-3">
  <div class="col-12">
    <a href="/dashboard/users/create" class="btn btn-primary mb-4">Tambah User</a>
    <a href="/dashboard/users/non-active" class="btn btn-danger mb-4">User Dinonaktifkan</a>
  </div>
    <table id="example" class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Last Seen</th>
        <th>Status</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->nama }}</td>
          <td>{{ $user->role }}</td>
          <td>
            @if ($user->last_seen)
              {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
            @else
              {{ __('Belum pernah login') }}
            @endif
          </td>
          <td>
            @if (Cache::has('user-is-online' . $user->id))
              <span class="badge bg-success">Online</span>
            @else
              <span class="badge bg-secondary">Offline</span>
            @endif
          </td>
          <td>
            <a href="/dashboard/users/{{ $user->username }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Tindakan ini akan menonaktifkan user, apakah Anda yakin?')"><i class="fas fa-times-circle"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
    
@endsection