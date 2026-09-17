{{-- edit renting dates --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Renting') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p class="mb-3">
                        {{ $renting->car->make }} {{ $renting->car->model }} ({{ $renting->car->year }})
                    </p>

                    <form action="{{ route('rentings.update', $renting) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="start_date" class="form-label">{{ __('Start date') }}</label>
                            <input type="date"
                                   class="form-control"
                                   id="start_date"
                                   name="start_date"
                                   value="{{ old('start_date', $renting->start_date->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">{{ __('End date') }}</label>
                            <input type="date"
                                   class="form-control"
                                   id="end_date"
                                   name="end_date"
                                   value="{{ old('end_date', $renting->end_date->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        <a href="{{ route('rentings.show', $renting) }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
