@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-3">Data Customer</h1>

    <div class="card shadow">
        <div class="table-responsive p-3">
        <div class="col-12">
          <a href="/dashboard/customers/candidates/create" class="btn btn-primary mb-4">Tambah Customer</a>
          {{-- <a href="#" class="btn btn-danger mb-4">Trash</a> --}}
        </div>
          <table id="example" class="table table-striped table-bordered table-sm table-hover">
            <thead>
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Aset</th>
              <th>Penawaran Harga</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              {{-- @foreach ($assets as $asset)
              <tr> 
                <td>
                  <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
                  <a href="#" class="badge bg-warning"><i class="fas fa-pen"></i></a>
                  <form action="/dashboard/assets/{{ $asset->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-times-circle"></i></button>
                  </form>
                </td>
              </tr>
                  
              @endforeach --}}
            </tbody>
            
          </table>
        </div>
@endsection