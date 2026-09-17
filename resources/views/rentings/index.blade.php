{{-- show cars rented by the user, including their make, model, year, color, and rental price. --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('My Rented Cars') }}
                    <a href="{{ route('rentings.create') }}" class="btn btn-primary btn-sm">{{ __('Rent a Car') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($rentings->isEmpty())
                        <p class="mb-0">{{ __("You haven't rented any cars yet.") }}</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>{{ __('Make') }}</th>
                                        <th>{{ __('Model') }}</th>
                                        <th>{{ __('Year') }}</th>
                                        <th>{{ __('Color') }}</th>
                                        <th>{{ __('Rental Price') }}</th>
                                        <th>{{ __('Start Date') }}</th>
                                        <th>{{ __('End Date') }}</th>
                                        <th>{{ __('Total Price') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentings as $renting)
                                        <tr>
                                            <td>{{ $renting->car->make }}</td>
                                            <td>{{ $renting->car->model }}</td>
                                            <td>{{ $renting->car->year }}</td>
                                            <td>{{ $renting->car->color }}</td>
                                            <td>${{ number_format($renting->car->rental_price, 2) }}</td>
                                            <td>{{ $renting->start_date->format('Y-m-d') }}</td>
                                            <td>{{ $renting->end_date->format('Y-m-d') }}</td>
                                            <td>${{ number_format($renting->price, 2) }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('rentings.show', $renting) }}" class="btn btn-sm btn-secondary">
                                                    {{ __('View') }}
                                                </a>
                                                <form action="{{ route('rentings.destroy', $renting) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('{{ __('Cancel this renting and return the car?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Cancel') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
