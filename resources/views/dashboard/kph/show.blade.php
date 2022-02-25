@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-3">{{ $kph->name }}</h1>
    {{ Breadcrumbs::render('kph.show', $kph) }}
@endsection