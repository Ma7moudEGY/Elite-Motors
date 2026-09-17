@extends('layouts.app')
@section('content')
<h1 class="text-center">Edit Car</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <label class="form-label">Make</label>
                    <input type="text" name="make" value="{{ $car->make }}" class="form-control">
                </div>

                <div class="mt-4">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" value="{{ $car->model }}" class="form-control">
                </div>

                <div class="mt-4">
                    <label class="form-label">Year</label>
                    <input type="number" name="year" value="{{ $car->year }}" class="form-control">
                </div>

                <div class="mt-4">
                    <label class="form-label">Color</label>
                    <input type="text" name="color" value="{{ $car->color }}" class="form-control">
                </div>

                <div class="mt-4">
                    <label class="form-label">Rental Price</label>
                    <input type="number" step="0.01" name="rental_price" value="{{ $car->rental_price }}" class="form-control">
                </div>

                <div class="mt-4">
                    <label class="form-label">Image</label>
                    @if($car->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/cars/' . $car->image) }}" width="100">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control">
                    <small class="text">Leave empty to keep the current image.</small>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Edit car</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection