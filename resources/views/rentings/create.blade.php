{{-- after the user clicks rent button, the car is added to the user's rented cars list
     and the car's availability status is updated to "rented". --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Available Cars') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($cars->isEmpty())
                        <p class="mb-0">{{ __('There are no cars in the system yet.') }}</p>
                    @else
                        <div class="row">
                            @foreach ($cars as $car)
                            
                            {{-- Uncomment this to remove cars owned by the current user --}}
                                {{-- @if ($car->owner->id === Auth::id()) --}}
                                    {{-- Skip the car if the current user is the owner --}}
                                    {{-- @continue --}}
                                {{-- @endif --}}
                                
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        @if ($car->image)
                                            <img src="{{ asset('storage/cars/' . $car->image) }}"
                                                 class="card-img-top"
                                                 alt="{{ $car->make }} {{ $car->model }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&auto=format&fit=crop&q=80"
                                                 class="card-img-top"
                                                 alt="{{ $car->make }} {{ $car->model }}">
                                        @endif

                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $car->make }} {{ $car->model }} ({{ $car->year }})</h5>
                                            <p class="card-text mb-1">{{ __('Color') }}: {{ $car->color }}</p>
                                            <p class="card-text mb-3">
                                                {{ __('Price per day') }}:
                                                {{ $car->rental_price ? '$' . number_format($car->rental_price, 2) : __('N/A') }}
                                            </p>

                                            <div class="mt-auto">
                                                @if ($car->is_rented)
                                                    {{-- Not rentable: already rented by someone else --}}
                                                    <div class="alert alert-secondary mb-0 py-2" role="alert">
                                                        {{ __('This car is currently rented and not available.') }}
                                                    </div>
                                                @elseif (! $car->rental_price)
                                                    {{-- Not rentable: no price set for it --}}
                                                    <div class="alert alert-secondary mb-0 py-2" role="alert">
                                                        {{ __('This car is not available for rent.') }}
                                                    </div>
                                                @else
                                                    {{-- Rentable: show the rent form --}}
                                                    <form action="{{ route('rentings.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="car_id" value="{{ $car->id }}">

                                                        <div class="mb-2">
                                                            <label for="start_date_{{ $car->id }}" class="form-label">{{ __('Start date') }}</label>
                                                            <input type="date"
                                                                   class="form-control form-control-sm showroom-date"
                                                                   id="start_date_{{ $car->id }}"
                                                                   name="start_date"
                                                                   min="{{ date('Y-m-d') }}"
                                                                   required>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="end_date_{{ $car->id }}" class="form-label">{{ __('End date') }}</label>
                                                            <input type="date"
                                                                   class="form-control form-control-sm showroom-date"
                                                                   id="end_date_{{ $car->id }}"
                                                                   name="end_date"
                                                                   min="{{ date('Y-m-d') }}"
                                                                   required>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                                            {{ __('Rent this car') }}
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
