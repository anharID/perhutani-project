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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Hapus Semua
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
          </div>
          <div class="modal-body">
            <p class="fs-5">Tindakan ini akan menghapus <span class="text-danger">permanen</span> semua data aset pada trash! Yakin ingin melanjutkan?</p>
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
  <a href="/dashboard/assets/" class="btn btn-secondary mb-3">Back</a>
  <div class="card shadow">
  <div class="table-responsive p-3">
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
              <button class="badge bg-info border-0"><i class="fa-solid fa-undo"></i></button>
            </form>
            
            <form action="/dashboard/assets/delete/{{ $asset->slug }}" method="post" class="d-inline">
              @method('post')
              @csrf

              <!-- Button trigger modal -->
              <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $asset->slug }}">
                <i class="fa-solid fa-trash"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop-{{ $asset->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
                    </div>
                    <div class="modal-body">
                      <p class="fs-5">Tindakan ini akan menghapus <span class="text-danger">permanen</span> data aset! Yakin ingin melanjutkan?</p>
                    </div>
                    <div class="modal-footer">
                      <form>
                        <button type="button" class="btn btn-secondary col-2" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger col-2" data-bs-target="#staticBackdrop-{{ $asset->slug }}">Ya</button>
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