@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-3">Customer PKS</h1>
    <div class="card shadow">
        <div class="table-responsive p-3">
        <div class="col-12">
          {{-- <a href="#" class="btn btn-danger mb-4">Trash</a> --}}
        </div>
          <table id="example" class="table table-striped table-bordered table-sm table-hover">
            <thead>
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Aset</th>
              <th>Biaya Sewa</th>
              <th>Tanggal Sewa</th>
              <th>Aksi</th> 
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>{{ $customer->asset->name }}</td>
                <td>{{ $customer->biayasewa }}</td>
                <td>{{ $customer->tanggalsewa }}</td>
                <td>
                  <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
                  <a href="#" class="badge bg-warning"><i class="fas fa-pen"></i></a>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
            
          </table>
        </div>
@endsection