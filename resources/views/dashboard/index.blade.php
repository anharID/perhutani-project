@extends('dashboard.layouts.main')

@section('container')
<h1 class="mb-3">Dashboard</h1>
{{-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol> --}}
{{ Breadcrumbs::render('dashboard') }}
<div class="row">
    
    @can('admin')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-capitalize mb-1">
                            KPH</div>
                        <div class="h5 mb-0 fw-bold text-gray-800">$40,000</div>
                        <a class="stretched-link" href="{{ route('kph') }}"></a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tree fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-capitalize mb-1">
                            Categories</div>
                        <div class="h5 mb-0 fw-bold text-gray-800">$40,000</div>
                        <a class="stretched-link" href="{{ route('category') }}"></a> 
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-capitalize mb-1">
                            Users</div>
                        <div class="h5 mb-0 fw-bold text-gray-800">$40,000</div>
                        <a class="stretched-link" href="{{ route('user') }}"></a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-capitalize mb-1">
                            Data Assets</div>
                        <div class="h5 mb-0 fw-bold text-gray-800">$40,000</div>
                        <a class="stretched-link" href="{{ route('assets') }}"></a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('supervisor')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-capitalize mb-1">
                            Approve</div>
                        <div class="h5 mb-0 fw-bold text-gray-800">$40,000</div>
                        <a class="stretched-link" href="{{ route('approve') }}"></a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    


    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">KPH</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('kph') }}">View Details</a> 
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Categories</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('category') }}">View Details</a> 
                <div class="small text-white"><i class="fas fa-angle-right"></i></div> 
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Users</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('user') }}">View Details</a> 
                <div class="small text-white"><i class="fas fa-angle-right"></i></div> 
            </div>
        </div>
    </div>
    @endcan --}}

    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Data Assets</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('assets') }}">View Details</a> 
                <div class="small text-white"><i class="fas fa-angle-right"></i></div> 
            </div>
        </div>
    </div> --}}
    {{-- @can('supervisor')
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Approve</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('approve') }}">View Details</a> 
                <div class="small text-white"><i class="fas fa-angle-right"></i></div> 
            </div>
        </div>
    </div>
    @endcan --}}
</div>
@endsection