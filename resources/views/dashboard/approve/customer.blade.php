@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">Approve Customer</h1>
    <div class="card shadow">
        <div class="table-responsive p-3">
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
                      <a href="/dashboard/customers/approved/{{ $customer->id }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                    </td>
                  </tr>
                      
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection