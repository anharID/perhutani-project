@extends('dashboard.layouts.main')

@section('container')
<h1>ini adalah halaman untuk KPH</h1>

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<a href="/dashboard/kph/create" class="btn btn-primary mb-3">New</a>
    
@endsection