@extends('dashboard.layouts.main')

@section('container')
    <h1>ini adalah halaman {{ $assets->name }}</h1>
    <body>
        <img src="{{ asset('storage/' . $assets->image) }}" alt="{{ $assets->name }} " class="img-fluid mt-3" width="200px" height="200px">
        <br>
        <a href="{{ asset('storage/' . $assets->image) }}"> lihat gambar</a>
        <br>
        {{ $assets->description }}
    </body>
@endsection