@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-3">Data Customer</h1>
    {{ Breadcrumbs::render('customers.candidates') }}

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
              <th>Ditambahkan Oleh</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>{{ $customer->asset->name }}</td>
                <td>{{ $customer->penawaran }}</td>
                <td>{{ $customer->user->nama }}</td>
                <td>
                  <a href="/dashboard/customers/candidates/{{ $customer->id }}" class="badge bg-info"><i class="fa-solid fa-eye"></i></a>
                  <a href="/dashboard/customers/candidates/{{ $customer->id }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen"></i></a>
                  <form action="/dashboard/customers/candidates/{{ $customer->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <!-- Button trigger modal -->
                    <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$customer->id}}">
                      <i class="fa-solid fa-times-circle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop-{{ $customer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Peringatan</h4>
                          </div>
                          <div class="modal-body">
                            <p class="fs-5">Tindakan ini akan menghapus calon customer! Yakin ingin melanjutkan?</p>
                          </div>
                          <div class="modal-footer">
                            <form>
                              <button type="button" class="btn btn-secondary col-2" data-bs-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-danger col-2" data-bs-target="#staticBackdrop-{{ $customer->id }}">Ya</button>
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