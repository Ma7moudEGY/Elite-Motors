{{-- Show car details --}}

@extends('layouts.app')

@section('content')
    <div class="container my-5 text-white">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="mb-3">
                    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                        <i class="fas fa-arrow-left me-2"></i> Back to Showroom
                    </a>
                </div>

                <div class="card bg-black border border-warning rounded-4 shadow-lg overflow-hidden text-white">
                    <div style="height: 250px; background-color: #111;">
                        <img src="{{ $car->image ? asset('storage/cars/' . $car->image) : 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&auto=format&fit=crop&q=80' }}"
                            class="w-100 h-100 object-fit-cover" alt="{{ $car->make }} {{ $car->model }}"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&auto=format&fit=crop&q=80';">
                    </div>
                    <div class="card-body p-4 bg-black">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span
                                class="badge {{ $car->is_rented ? 'bg-secondary' : 'bg-warning text-black' }} px-3 py-1 fw-bold text-uppercase"
                                style="font-size: 0.8rem;">
                                {{ $car->is_rented ? 'Rented' : 'Available' }}
                            </span>
                            <span class="fs-5 fw-bold text-warning">${{ number_format((float) $car->rental_price, 2) }}
                                <small class="text-secondary fs-6">/ day</small></span>
                        </div>

                        <h3 class="text-white fw-bold mb-3 h4">{{ $car->make }} {{ $car->model }}</h3>

                        <div class="row g-3 text-secondary small mb-4">
                            <div class="col-6">
                                <span class="d-block text-warning fw-semibold">Year</span>
                                {{ $car->year }}
                            </div>
                            <div class="col-6">
                                <span class="d-block text-warning fw-semibold">Color</span>
                                {{ $car->color }}
                            </div>
                            <div class="col-6">
                                <span class="d-block text-warning fw-semibold">Owner</span>
                                {{ $car->owner?->name ?? 'Not assigned' }}
                            </div>
                            <div class="col-6">
                                <span class="d-block text-warning fw-semibold">Added</span>
                                {{ $car->created_at?->format('M d, Y') ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="d-flex gap-2 pt-2 border-top border-secondary">
                            @if (Auth::id() === $car->user_id)
                                <a href="{{ route('cars.edit', $car->id) }}"
                                    class="btn btn-outline-warning btn-sm px-4 py-2">Edit</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this car?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" <?= $car->is_rented ? 'disabled' : '' ?>
                                        class="btn btn-outline-danger btn-sm px-3 py-2">Delete</button>
                                </form>
                            @else
                                @if (!$car->is_rented)
                                    <a href="{{ route('rentings.create', ['car_id' => $car->id]) }}"
                                        class="btn btn-warning text-black fw-bold btn-sm px-4 py-2 flex-grow-1">Book This Car</a>
                                @else
                                    <span class="btn btn-secondary btn-sm px-4 py-2 flex-grow-1 disabled">Currently Rented</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection