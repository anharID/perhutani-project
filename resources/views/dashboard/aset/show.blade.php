@extends('dashboard.layouts.main')

@section('container')
    <h1>ini adalah halaman {{ $asset->name }}</h1>
    <body>
        {{ $asset->description }}

        @if ($asset->image)
            <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ 
            $asset->category->name }}" class="img-fluid mt-3">

        @endif
    </body>
@endsection