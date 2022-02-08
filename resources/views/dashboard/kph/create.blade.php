@extends('dashboard.layouts.main')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data KPH</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid p-5">
      <h1 class="mb-4">Tambah Data KPH</h1>
        <form class="row g-3" action="/dashboard/kph" method="POST">
          @csrf
            <div class="col-12">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Inputkan code">
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Nama KPH</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inputkan nama KPH">
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Alamat KPH</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Inputkan alamat KPH">
              </div>
            <div class="col-md-6">
              <label for="lu_coordinate" class="form-label">Koordinasi LU</label>
              <input type="text" name="lu_coordinate" class="form-control @error('lu_coordinate') is-invalid @enderror" id="lu_coordinate" placeholder="Inputkan koordinasi LU">
            </div>
            <div class="col-md-6">
              <label for="ls_coordinate" class="form-label">Koordinasi LS</label>
              <input type="text" name="ls_coordinate" class="form-control @error('ls_coordinate') is-invalid @enderror" id="ls_coordinate" placeholder="Inputkan Koordinasi LS">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Input Data</button>
            </div>
      </form>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
    
@endsection