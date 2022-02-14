@extends('dashboard.layouts.main')

@section('container')
    <h1>ini adalah halaman {{ $asset->name }}</h1>
    <body>
        {{ $asset->description }}
    </body>
@endsection