@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 text-center">
            <span class="text-warning text-uppercase fw-bold small">About Elite Motors</span>
            <h1 class="display-5 fw-bold text-white mt-3 mb-4">A better way to <span class="text-warning">rent a car.</span></h1>
            <p class="lead text-secondary">
                Elite Motors connects people with cars they can trust. Our rental showroom makes it easy to discover available vehicles, compare their details, and reserve the right car for your plans.
            </p>
        </div>
    </div>

    <div class="row g-4 mt-5">
        <div class="col-md-4">
            <div class="card h-100 p-4 rounded-4">
                <i class="fas fa-shield-halved text-warning fs-2 mb-4"></i>
                <h2 class="h5 text-white">Built on trust</h2>
                <p class="text-secondary mb-0">Clear vehicle information and owner details help every renter make a confident choice.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 rounded-4">
                <i class="fas fa-sliders text-warning fs-2 mb-4"></i>
                <h2 class="h5 text-white">Made for choice</h2>
                <p class="text-secondary mb-0">From daily drives to special occasions, explore a growing collection of vehicles in one place.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 rounded-4">
                <i class="fas fa-route text-warning fs-2 mb-4"></i>
                <h2 class="h5 text-white">Ready for the road</h2>
                <p class="text-secondary mb-0">Select your dates, send your booking, and spend less time managing details.</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('cars.index') }}" class="btn btn-warning text-black fw-semibold px-4 py-3">Browse Our Cars</a>
    </div>
</div>
@endsection