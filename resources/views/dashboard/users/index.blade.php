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
            <a href="/dashboard/users/{{ $user->username }}" class="badge bg-info"><i class="fa-solid fa-eye"></i></a>
            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
            <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
              @method('delete')
              @csrf

              <!-- Button trigger modal -->
              <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fa-solid fa-times-circle"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
                    </div>
                    <div class="modal-body">
                      <p class="fs-5">Tindakan ini akan menonaktifkan akun. Yakin ingin melanjutkan?</p>
                    </div>
                    <div class="modal-footer">
                      <form>
                        <button type="button" class="btn btn-secondary col-2" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger col-2" data-bs-target="#staticBackdrop">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
    
@endsection