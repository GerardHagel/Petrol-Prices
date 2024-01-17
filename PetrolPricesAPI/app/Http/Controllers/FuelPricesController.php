<?php

namespace App\Http\Controllers;

use App\Models\FuelPrice;
use Illuminate\Http\Response;

class FuelPricesController extends Controller
{
    /**
     * Fetch and return the current prices of fuel from the FuelStation table.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrentPrices()
    {
        // Select only the fuel_type and price from each FuelStation record
        $currentPrices = FuelPrice::select('fuel_type', 'price')->get();

        // Return the fetched data as JSON
        return response()->json($currentPrices);
    }

    // You can add other methods here if needed
}
