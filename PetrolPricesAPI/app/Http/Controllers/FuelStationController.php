<?php

namespace App\Http\Controllers;

use App\FuelStation;
use Illuminate\Http\Request;
use App\Models\FuelPrice;

class FuelStationController extends Controller
{

    public function search(Request $request)
    {
        $location = $request->input('location');
        $fuelType = $request->input('fuel_type');
        $maxPrice = $request->input('max_price');
        $openNow = $request->input('open_now');

        $query = FuelStation::query();

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
            $query->whereJsonContains('opening_hours', ['day' => now()->format('l'), 'open' => true]);
        }

        $fuelStations = $query->get();

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

    public function show($id)
    {
        $station = FuelStation::findOrFail($id);
        $currentPrices = $station->fuelPrices()->latest()->take(5)->get(); // Aktualne ceny (ostatnie 5)
        $historicalPrices = $station->fuelPrices()->oldest()->take(10)->get(); // Historyczne ceny (pierwsze 10)

        return view('fuel_stations.show', compact('station', 'currentPrices', 'historicalPrices'));
    }
}
