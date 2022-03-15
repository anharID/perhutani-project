@extends('dashboard.layouts.main')
@section('container')
<h1 class="mb-3">Data Asset</h1>
{{ Breadcrumbs::render('assets') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <div class="card shadow">
  <div class="table-responsive p-3">
  <div class="col-12">
    <a href="/dashboard/assets/create" class="btn btn-primary mb-4">Tambah Asset</a>
    <a href="{{ route('trash') }}" class="btn btn-danger mb-4">Trash</a>
  </div>
    <table id="example" class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama Aset</th>
        <th>Kategori</th>
        <th>Ditambahkan oleh</th>
        <th>Status Approval</th>
        <th>Disetujui oleh</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($assets as $asset)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $asset->code }}</td>
          <td>{{ $asset->name }}</td>
          <td>{{ $asset->category->name }}</td>
          <td>{{ $asset->user->nama }}</td>
          @if ($asset->status)
          <td><span class="badge bg-success">Sudah</span></td>
          <td>{{ $asset->approve_by }}</td>
          @else
          <td><span class="badge bg-danger">Belum</span></td>
          <td><span>-</span></td>
          @endif
          <td>
            <a href="/dashboard/assets/{{ $asset->slug }}" class="badge bg-info"><i class="fa-solid fa-eye"></i></a>
            <a href="/dashboard/assets/{{ $asset->slug}}/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
            <form action="/dashboard/assets/{{ $asset->slug }}" method="post" class="d-inline">
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
                      <p class="fs-5">Tindakan ini akan menghapus data aset! Yakin ingin melanjutkan?</p>
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