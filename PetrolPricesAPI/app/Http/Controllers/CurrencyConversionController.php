<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyConversionController extends Controller
{
    public function convert(Request $request)
    {
        $fromCurrency = $request->query('from');
        $toCurrency = $request->query('to');
        $amount = $request->query('amount');

        $apiKey = env('EXCHANGE_RATE_API_KEY');
        $response = Http::get("https://api.exchangerate-api.com/v4/latest/{$fromCurrency}?apiKey={$apiKey}");

        if ($response->successful()) {
            $rate = $response->json()['rates'][$toCurrency] ?? null;
            if ($rate) {
                $convertedAmount = $amount * $rate;
                return response()->json(['convertedAmount' => $convertedAmount]);
            }
        }

        return response()->json(['error' => 'Nie można przeprowadzić konwersji waluty.'], 500);
    }
}
