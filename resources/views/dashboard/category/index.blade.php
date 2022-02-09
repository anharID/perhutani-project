@extends('dashboard.layouts.main')
@section('container')
<div class="container-fluid p-5">
    <h1 class="mb-4">Data Kategori</h1>

    <form class="col-lg-4" action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tambah kategori baru" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">Tambah</button>
        </div>

    </form>
    
    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Nama</th>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Bangunan</td>
        </tr>
            
      </tbody>
      
    </table>

</div>
    
@endsection