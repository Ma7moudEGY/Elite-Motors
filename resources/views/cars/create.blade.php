{{-- Create a new car

@extends('layouts.app')

@section('content')

@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                <div class="card-header">
                    Add New Car
                </div>

                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Make</label>
                                <input type="text" name="make" value="{{ old('make') }}" class="form-control">

                                @error('make')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Model</label>
                                <input type="text" name="model" value="{{ old('model') }}" class="form-control">

                                @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Year</label>
                                <input type="number" name="year" value="{{ old('year') }}" class="form-control">

                                @error('year')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Color</label>
                                <input type="text" name="color" value="{{ old('color') }}" class="form-control">

                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Rental Price</label>
                                <input type="number" step="0.01" name="rental_price"
                                       value="{{ old('rental_price') }}" class="form-control">

                                @error('rental_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Car Image</label>
                                <input type="file" name="image" class="form-control">

                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Add Car
                        </button>

                        <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection