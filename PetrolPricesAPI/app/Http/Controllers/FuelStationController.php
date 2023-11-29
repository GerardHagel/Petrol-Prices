<?php

namespace App\Http\Controllers;

use App\FuelStation;
use Illuminate\Http\Request;

class FuelStationController extends Controller
{
    public function search(Request $request)
    {
        $location = $request->input('location');
        $fuelType = $request->input('fuel_type');

        $fuelStations = FuelStation::query()
            ->where('location', 'like', "%$location%")
            ->where('fuel_type', 'like', "%$fuelType%")
            // Dodaj inne warunki wyszukiwania według potrzeb
            ->get();

        return view('fuel_stations.results', compact('fuelStations'));
    }

    public function search(Request $request)
    {
        // Pobierz dane z formularza
        $location = $request->input('location');
        $fuelType = $request->input('fuel_type');
        $maxPrice = $request->input('max_price');
        $openNow = $request->input('open_now');

        // Rozpocznij zapytanie do bazy danych
        $query = FuelStation::query();

        // Dodaj warunki wyszukiwania
        if ($location) {
            $query->where('location', 'like', "%$location%");
        }

        if ($fuelType) {
            $query->where('fuel_type', 'like', "%$fuelType%");
        }

        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }

        if ($openNow) {
            // Załóżmy, że w modelu FuelStation mamy pole 'opening_hours' w formie JSON
            // i możemy używać funkcji 'now()' do sprawdzenia, czy stacja jest otwarta
            $query->whereJsonContains('opening_hours', ['day' => now()->format('l'), 'open' => true]);
        }

        // Pobierz wyniki z bazy danych
        $fuelStations = $query->get();

        // Przekaż wyniki do widoku
        return view('fuel_stations.results', compact('fuelStations'));
    }

    public function index()
    {
        $fuelStations = FuelStation::all();

        return view('fuel_stations.index', compact('fuelStations'));
    }

    public function create()
    {
        return view('fuel_stations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'fuel_type' => 'required|max:255',
            'price' => 'required|numeric',
            'opening_hours' => 'required|max:255',
        ]);

        FuelStation::create($validatedData);

        return redirect()->route('fuel_stations.index')->with('success', 'Fuel station created successfully');
    }

    public function edit(FuelStation $fuelStation)
    {
        return view('fuel_stations.edit', compact('fuelStation'));
    }

    public function update(Request $request, FuelStation $fuelStation)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'fuel_type' => 'required|max:255',
            'price' => 'required|numeric',
            'opening_hours' => 'required|max:255',
        ]);

        $fuelStation->update($validatedData);

        return redirect()->route('fuel_stations.index')->with('success', 'Fuel station updated successfully');
    }

    public function destroy(FuelStation $fuelStation)
    {
        $fuelStation->delete();

        return redirect()->route('fuel_stations.index')->with('success', 'Fuel station deleted successfully');
    }
}
