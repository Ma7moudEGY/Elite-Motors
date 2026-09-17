<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::orderBy('id', 'desc')->get();
        
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-car');

        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    Gate::authorize('create-car');

    $request->validate([
        'make' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        'color' => 'required|string|max:255',
        'rental_price' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('cars', $imageName, 'public');
    }

    Car::create([
        'make' => $request->make,
        'model' => $request->model,
        'year' => $request->year,
        'color' => $request->color,
        'image' => $imageName,
        'is_rented' => $request->has('is_rented'),
        'rental_price' => $request->rental_price,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('cars.index')
        ->with('success', 'Car added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        Gate::authorize('update-car', $car);

        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        Gate::authorize('update-car', $car);

        $request->validate([
            'make' => 'required',
            'model' => 'required',
        ]);

        $data = [
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'rental_price' => $request->rental_price,
            'user_id' => auth()->id(),
        ];

        if ($request->hasFile('image')) {
            $nameImage = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('cars', $nameImage, 'public');
            $data['image'] = $nameImage;
        }

        $car->update($data);

        return redirect(route('cars.index'))->with('success', 'edit success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Gate::authorize('update-car', $car);

        $car->delete();

        return redirect()->route('cars.index')->with('msg', 'deleted');
    }
}
