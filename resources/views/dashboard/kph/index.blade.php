@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-4">Data KPH</h1>
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <a href="/dashboard/kph/create" class="btn btn-primary mb-3">Tambah Data</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama KPH</th>
        <th>Alamat KPH</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($kphs as $kph)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kph->code }}</td>
          <td>{{ $kph->name }}</td>
          <td>{{ $kph->address }}</td>
          <td>
            <a href="#" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/kph/{{ $kph->id }}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            <a href="/dashboard/kph/{{ $kph->id }}/confirm" class="badge bg-danger"><i class="fas fa-times-circle"></i></a>
            {{-- <form class="d-inline">
              @method('DELETE')
              @csrf
              <button 
              class="badge bg-danger border-0 confirm" 
              data-id="{{ $kph->id }}"  --}}
              {{-- onclick="return @stack('sweetalert') " --}}
              {{-- >
                <i class="fas fa-times-circle"></i>
              </button> --}}

              {{-- <a href="#" class="badge bg-danger border-0" data-id="{{ $kph->id }}"><i class="fas fa-times-circle"></i></a> --}}

              
            {{-- </form> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

{{-- @section('sweetalertconfirm')
<script>
  $('.confirm').click( function(){
      var deleteconfirm = $(this).attr('data-id');
      swal({
      title: "Apakah Anda yakin?",
      text: "Anda akan menghapus data ini!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
          window.location = "/dashboard/kph/"+deleteconfirm+""
          swal("Data berhasil dihapus!", {
              icon: "success",
          });
      } else {
          swal("Data tidak jadi dihapus!");
      }
  });

  });
  
  
</script>
 @endsection  --}}

