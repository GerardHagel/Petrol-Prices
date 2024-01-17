<?php

namespace App\Http\Controllers;

use App\Models\FuelStation;
use Illuminate\Http\Request;

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
            // Assuming 'opening_hours' is a JSON field and contains a structure to determine if open now
            // This logic might need to be adjusted based on your actual data structure
            $query->whereJsonContains('opening_hours', ['day' => now()->format('l'), 'open' => true]);
        }

        $fuelStations = $query->get();

        // Return a JSON response for the API
        return response()->json($fuelStations);
    }
    public function index()
    {
        $fuelStations = FuelStation::all();

        return view('index', compact('fuelStations'));
    }

    public function create()
    {
      //  dd('Metoda create działa!');
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

        return view('show', compact('station', 'currentPrices', 'historicalPrices'));
    }
}
