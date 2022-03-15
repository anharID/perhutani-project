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
              
              <!-- Button trigger modal -->
              <button type="button" class="badge bg-info border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Aktifkan
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
                    </div>
                    <div class="modal-body">
                      <p class="fs-5">Tindakan ini akan mengaktifkan kembali akun. Yakin ingin melanjutkan?</p>
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