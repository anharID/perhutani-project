@extends('dashboard.layouts.main')
@section('container')
    <h1 class="mb-4">Data Kategori</h1>
    <div class="card shadow">
    <div class="p-3"> 
    
    {{-- @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
      </div>
    @endif --}}

    <form class="col-lg-4" action="/dashboard/category" method="POST">
      @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Tambah kategori baru">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
    
    <table class="table table-striped table-bordered table-sm table-hover">
      <thead>
        <th>No.</th>
        <th>Nama</th>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
          </tr>
        @endforeach
            
      </tbody>
      
    </table>
    
@endsection