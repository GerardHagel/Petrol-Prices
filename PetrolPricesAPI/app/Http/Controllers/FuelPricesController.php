<?php

namespace App\Http\Controllers;

use App\Models\FuelPrice;
use Illuminate\Http\Request;

class FuelPricesController extends Controller
{
    public function getCurrentPrices()
    {
        $currentPrices = FuelPrice::where('date', '>=', now())->get();
        return response()->json($currentPrices);
    }

    public function getHistoricalPrices()
    {
        $historicalPrices = FuelPrice::where('date', '<', now())->get();
        return response()->json($historicalPrices);
    }
}
