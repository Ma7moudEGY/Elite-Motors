{{-- Show all cars available for renting --}}

@extends('layouts.app')

@section('content')
<div class="container my-5 text-white">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5 text-white">LUXURY <span class="text-warning">SHOWROOM</span></h1>
        <p class="text-secondary">Explore our exclusive fleet of available vehicles.</p>
    </div>

    <div class="row">
        @isset($cars)
            @forelse($cars as $car)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card showroom-card rounded-4 h-100 shadow-sm overflow-hidden text-white">
                        <div style="height: 220px; background-color: #111;">
                            <img src="{{ $car->image ? asset('storage/cars/' . $car->image) : 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&auto=format&fit=crop&q=80' }}" class="w-100 h-100 object-fit-cover" alt="{{ $car->make }} {{ $car->model }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&auto=format&fit=crop&q=80';">
                        </div>
                        <div class="card-body bg-black d-flex flex-column p-4">
                            <span class="badge {{ $car->is_rented ? 'bg-secondary' : 'bg-warning text-black' }} align-self-start mb-2 fw-bold text-uppercase" style="font-size: 0.75rem;">
                                {{ $car->is_rented ? 'Rented' : 'Available' }}
                            </span>
                            <h4 class="text-white fw-semibold mb-2">{{ $car->make }} {{ $car->model }}</h4>
                            <p class="text-secondary small flex-grow-1 mb-3" style="font-size: 0.85rem;">
                                {{ $car->year }} &middot; {{ $car->color }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top border-secondary">
                                <span class="fs-5 fw-bold text-warning">
                                    ${{ number_format((float) $car->rental_price, 2) }} <small class="text-secondary fs-6">/ day</small>
                                </span>
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-outline-warning btn-sm px-3 fw-semibold">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-black border border-secondary rounded-4">
                        <i class="fas fa-car fa-3x text-warning mb-3"></i>
                        <h4 class="text-white">No Cars Found</h4>
                        <p class="text-secondary">Try searching for another car brand or name.</p>
                    </div>
                </div>
            @endforelse
        @endisset
    </div>
</div>
@endsection
