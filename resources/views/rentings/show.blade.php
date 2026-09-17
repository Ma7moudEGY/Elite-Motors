{{-- show renting data --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Renting Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <dl class="row mb-0">
                        <dt class="col-sm-4">{{ __('Car') }}</dt>
                        <dd class="col-sm-8">{{ $renting->car->make }} {{ $renting->car->model }} ({{ $renting->car->year }})</dd>

                        <dt class="col-sm-4">{{ __('Color') }}</dt>
                        <dd class="col-sm-8">{{ $renting->car->color }}</dd>

                        <dt class="col-sm-4">{{ __('Rental Price per Day') }}</dt>
                        <dd class="col-sm-8">${{ number_format($renting->car->rental_price, 2) }}</dd>

                        <dt class="col-sm-4">{{ __('Start Date') }}</dt>
                        <dd class="col-sm-8">{{ $renting->start_date->format('Y-m-d') }}</dd>

                        <dt class="col-sm-4">{{ __('End Date') }}</dt>
                        <dd class="col-sm-8">{{ $renting->end_date->format('Y-m-d') }}</dd>

                        <dt class="col-sm-4">{{ __('Total Price') }}</dt>
                        <dd class="col-sm-8">${{ number_format($renting->price, 2) }}</dd>
                    </dl>

                    <div class="mt-4">
                        <a href="{{ route('rentings.index') }}" class="btn btn-secondary">{{ __('Back to My Rentals') }}</a>
                        <a href="{{ route('rentings.edit', $renting) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                        <form action="{{ route('rentings.destroy', $renting) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('{{ __('Cancel this renting and return the car?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Cancel Renting') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
