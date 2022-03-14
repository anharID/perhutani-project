@extends('dashboard.layouts.main')

@section('container')

  <h1 class="mb-3">Data KPH</h1>
  {{ Breadcrumbs::render('kph') }}
  
  {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif --}}
  
  <div class="card shadow">
  <div class="table-responsive p-3">
    <div class="col-12">
      <a href="/dashboard/kph/create" class="btn btn-primary mb-4">Tambah Data</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-sm table-hover">
      
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
            <a href="/dashboard/kph/{{ $kph->id }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
            <a href="/dashboard/kph/{{ $kph->id }}/edit" class="badge bg-warning"><i class="fas fa-pen"></i></a>
            {{-- <a href="/dashboard/kph/{{ $kph->id }}/confirm" class="badge bg-danger"><i class="fas fa-times-circle"></i></a> --}}
            <form action="/dashboard/kph/{{ $kph->id }}" method="POST" class="d-inline" id="actionDelete">
              @method('delete')
              @csrf
              {{-- <button class="badge bg-danger border-0" onclick= "return confirm('Yakin ingin menghapus data?')">
                <i class="fas fa-times-circle"></i>
              </button> --}}
              
              <!-- Button trigger modal -->
              <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick= "">
                <i class="fas fa-times-circle"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Yakin ingin menghapus data?</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger" data-bs-target="#staticBackdrop">Ya</button>
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

