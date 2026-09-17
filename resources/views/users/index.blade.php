@extends('layouts.app')

@section('content')
<style>
    #profileTabs .nav-link {
        color: #adb5bd;
        background: transparent;
        border: 0;
        border-bottom: 2px solid transparent;
        padding: 0.75rem 1rem;
        transition: all 0.2s ease;
    }

    #profileTabs .nav-link:hover,
    #profileTabs .nav-link:focus {
        color: #ffffff;
        border-bottom-color: rgba(255, 193, 7, 0.6);
    }

    #profileTabs .nav-link.active {
        color: #ffc107;
        background: transparent;
        border-bottom-color: #ffc107;
    }
</style>

<div class="container my-5">
    <div class="text-center mb-5">
        {{-- <span class="badge bg-warning text-black px-3 py-2 fw-bold text-uppercase rounded-pill" style="letter-spacing: 1px; font-size: 0.75rem;">Member Profile</span> --}}
        <h1 class="fw-bold display-5 text-white mt-3">MY <span class="text-warning">PROFILE</span></h1>
    </div>

    <div class="card showroom-card rounded-4 shadow-sm overflow-hidden border border-warning text-white mb-4">
        <div class="card-body p-4 p-md-5 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div>
                <p class="text-warning text-uppercase fw-semibold small mb-2" style="letter-spacing: 1px;">Member Details</p>
                <h2 class="h3 fw-bold mb-2">{{ $user->name }}</h2>
                <p class="text-secondary mb-1">{{ $user->email }}</p>
                <small class="text-secondary">Member since {{ $user->created_at->format('d M, Y') }}</small>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-black fw-semibold rounded-pill px-4">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-md-4">
            <div class="card showroom-card rounded-4 h-100 border border-secondary shadow-sm">
                <div class="card-body p-4">
                    <span class="text-secondary small text-uppercase" style="letter-spacing: 1px;">Owned Cars</span>
                    <h3 class="fw-bold mt-3 mb-0 text-warning">{{ $user->ownedCars->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card showroom-card rounded-4 h-100 border border-secondary shadow-sm">
                <div class="card-body p-4">
                    <span class="text-secondary small text-uppercase" style="letter-spacing: 1px;">Total Bookings</span>
                    <h3 class="fw-bold mt-3 mb-0 text-warning">{{ $user->rentings->count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card showroom-card rounded-4 shadow-sm overflow-hidden border border-secondary text-white">
        <div class="card-header bg-black border-bottom border-secondary pt-3">
            <ul class="nav nav-tabs card-header-tabs border-0" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold" id="cars-tab" data-bs-toggle="tab" data-bs-target="#cars" type="button" role="tab">
                        My Cars ({{ $user->ownedCars->count() }})
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="rentals-tab" data-bs-toggle="tab" data-bs-target="#rentals" type="button" role="tab">
                        My Rentals ({{ $user->rentings->count() }})
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body tab-content p-4" id="profileTabsContent">
            <div class="tab-pane fade show active" id="cars" role="tabpanel">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('cars.create') }}" class="btn btn-warning text-black fw-semibold rounded-pill px-4">+ Add New Car</a>
                </div>

                @forelse ($user->ownedCars as $car)
                    <div class="card mb-3 border border-secondary rounded-4 shadow-sm bg-black">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3 px-4">
                            <div>
                                <h6 class="mb-1 text-white fw-semibold">{{ $car->brand ?? 'Car' }} {{ $car->model ?? '' }}</h6>
                                <small class="text-secondary">Plate: {{ $car->plate_number ?? 'N/A' }}</small>
                            </div>
                            <div class="mt-3 mt-md-0 d-flex gap-2">
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-outline-warning btn-sm px-3">View</a>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-outline-light btn-sm px-3">Edit</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p class="text-secondary mb-0">You haven't added any cars yet.</p>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="rentals" role="tabpanel">
                @forelse ($user->rentings as $rental)
                    <div class="card mb-3 border border-secondary rounded-4 shadow-sm bg-black">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3 px-4">
                            <div>
                                <h6 class="mb-1 text-white fw-semibold">Rental #{{ $rental->id }}</h6>
                                <small class="text-secondary">
                                    {{ $rental->start_date ?? '' }} - {{ $rental->end_date ?? '' }}
                                </small>
                            </div>
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('rentings.show', $rental->id) }}" class="btn btn-outline-warning btn-sm px-3">Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p class="text-secondary mb-0">No car rental history found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
