<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyConversionControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_converts_currency_successfully()
    {
        Http::fake([
            'https://api.exchangerate-api.com/v4/latest/USD*' => Http::response([
                'rates' => ['EUR' => 0.85]
            ], 200)
        ]);

        $response = $this->get('/currency-convert?from=USD&to=EUR&amount=100');

        $response->assertOk();
        $response->assertJson(['convertedAmount' => 85.0]);
    }

    /** @test */
    public function it_returns_an_error_if_conversion_fails()
    {
        Http::fake([
            'https://api.exchangerate-api.com/v4/latest/USD*' => Http::response(null, 500)
        ]);

        $response = $this->get('/currency-convert?from=USD&to=EUR&amount=100');

        $response->assertStatus(500);
        $response->assertJson(['error' => 'Nie można przeprowadzić konwersji waluty.']);
    }
}
