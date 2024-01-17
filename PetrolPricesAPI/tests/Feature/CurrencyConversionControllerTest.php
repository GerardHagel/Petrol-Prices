<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;

class CurrencyConversionControllerTest extends TestCase
{
    public function test_currency_conversion()
    {
        // Przykładowe dane do testu
        $fromCurrency = 'USD';
        $toCurrency = 'EUR';
        $amount = 100;
        $exchangeRate = 0.85; // Przykładowa stawka wymiany

        // Symulowanie odpowiedzi z API kursów walut
        Http::fake([
            "https://api.exchangerate-api.com/v4/latest/{$fromCurrency}" => Http::response([
                'rates' => [
                    $toCurrency => $exchangeRate,
                ],
            ]),
        ]);

        // Wywołanie kontrolera i sprawdzenie odpowiedzi
        $response = $this->get("/api/currency-convert?from={$fromCurrency}&to={$toCurrency}&amount={$amount}");
        $response->assertJson([
            'convertedAmount' => 91.9,
        ]);
    }

    public function test_invalid_currency_conversion()
    {
        // Przykładowe dane do testu
        $fromCurrency = 'USD';
        $toCurrency = 'XYZ'; // Nieznana waluta
        $amount = 100;

        // Symulowanie nieudanej odpowiedzi z API kursów walut
        Http::fake([
            "https://api.exchangerate-api.com/v4/latest/{$fromCurrency}" => Http::response([], 500),
        ]);

        // Wywołanie kontrolera i sprawdzenie odpowiedzi
        $response = $this->get("/api/currency-convert?from={$fromCurrency}&to={$toCurrency}&amount={$amount}");
        $response->assertStatus(500)
            ->assertJson([
                'error' => 'Nie można przeprowadzić konwersji waluty.',
            ]);
    }
}
