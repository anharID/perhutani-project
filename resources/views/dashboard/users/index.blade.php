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
  <div class="p-3"> 
  <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah User</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
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
              <span class="text-success">Online</span>
            @else
              <span class="text-secondary">Offline</span>
            @endif
          </td>
          <td>
            <a href="/dashboard/users/{{ $user->username }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <a href="#" class="badge bg-danger"><i class="fas fa-times-circle"></i></a>
          </td>
        </tr>
            
        @endforeach
      </tbody>
    </table>
    
  </div>
    
@endsection