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
                  <form action="/dashboard/customers/candidates{{ $customer->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fa-solid fa-times-circle"></i></button>
                  </form>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
            
          </table>
        </div>
@endsection