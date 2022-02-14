@extends('dashboard.layouts.main')

@section('container')
    <h1>ini adalah halaman {{ $assets->name }}</h1>
    <body>
        {{-- <a href="{{ asset('storage/asset-images/' . $assets->image) }}"> lihat gambar</a> --}}
        
        <img src="{{ asset('storage/' . $assets->image) }}" alt="{{ $assets->name }} " class="img-fluid mt-3" width="200px" height="200px">
        <br>
        {{ $assets->description }}
    </body>
@endsection