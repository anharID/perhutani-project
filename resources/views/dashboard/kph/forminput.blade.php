@extends('dashboard.layouts.main')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid p-5">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputCode" class="form-label">Code</label>
                <input type="text" class="form-control" id="inputCode" placeholder="Inputkan code">
              </div>
              <div class="col-12">
                <label for="inputNamaKPH" class="form-label">Nama KPH</label>
                <input type="text" class="form-control" id="inputNamaKPH" placeholder="Inputkan nama KPH">
              </div>
              <div class="col-12">
                <label for="inputAlamatKPH" class="form-label">Alamat KPH</label>
                <input type="text" class="form-control" id="inputAlamatKPH" placeholder="Inputkan alamat KPH">
              </div>
            <div class="col-md-6">
              <label for="inputKoordinasiLU" class="form-label">Koordinasi LU</label>
              <input type="text" class="form-control" id="inputKoordinasiLU" placeholder="Inputkan koordinasi LU">
            </div>
            <div class="col-md-6">
              <label for="inputKoordinasiLS" class="form-label">Koordinasi LS</label>
              <input type="text" class="form-control" id="inputKoordinasiLS" placeholder="Inputkan Koordinasi LS">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
      </form>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
    
@endsection