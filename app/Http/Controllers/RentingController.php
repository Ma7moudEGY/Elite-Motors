<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Renting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RentingController extends Controller {
    /**
     * Display a listing of the cars the current user has rented.
     */
    public function index(Request $request) {
        $rentings = $request->user()
            ->rentings()
            ->with('car')
            ->latest()
            ->get();

        return view('rentings.index', compact('rentings'));
    }

    /**
     * Show all cars so the user can rent one that is available.
     */
    public function create() {
        $cars = Car::where('user_id', '!=', request()->user()->id)
            ->orWhereNull('user_id')
            ->orderBy('make')
            ->orderBy('model')
            ->get();

        return view('rentings.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage (rent a car).
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'car_id' => ['required', 'exists:cars,id'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        return DB::transaction(function () use ($validated, $request) {
            // Lock the row so two users can't rent the same car at the same time.
            $car = Car::where('id', $validated['car_id'])->lockForUpdate()->firstOrFail();

            Gate::authorize('rent-car', $car);

            if ($car->is_rented) {
                return redirect()
                    ->route('rentings.create')
                    ->with('error', 'Sorry, that car was just rented by someone else and is no longer available.');
            }

            if (! $car->rental_price) {
                return redirect()
                    ->route('rentings.create')
                    ->with('error', 'That car is not available for rent.');
            }

            $renting = new Renting([
                'user_id' => $request->user()->id,
                'car_id' => $car->id,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]);

            // So calculateTotalPrice() doesn't have to hit the DB again.
            $renting->setRelation('car', $car);
            $renting->price = $renting->calculateTotalPrice();
            $renting->save();

            $car->update(['is_rented' => true]);

            return redirect()
                ->route('rentings.index')
                ->with('status', 'Car rented successfully!');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Renting $renting) {
        Gate::authorize('view-renting', $renting);

        $renting->load('car');

        return view('rentings.show', compact('renting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Renting $renting) {
        Gate::authorize('update-renting', $renting);

        $renting->load('car');

        return view('rentings.edit', compact('renting'));
    }

    /**
     * Update the specified resource in storage (change the rental dates).
     */
    public function update(Request $request, Renting $renting) {
        Gate::authorize('update-renting', $renting);

        $validated = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        $renting->fill($validated);
        $renting->price = $renting->calculateTotalPrice();
        $renting->save();

        return redirect()
            ->route('rentings.show', $renting)
            ->with('status', 'Renting updated successfully.');
    }

    public function destroy(Renting $renting) {
        Gate::authorize('cancel-renting', $renting);

        $renting->car()->update(['is_rented' => false]);
        $renting->delete();

        return redirect()
            ->route('rentings.index')
            ->with('status', 'Renting cancelled and the car is available again.');
    }
}
