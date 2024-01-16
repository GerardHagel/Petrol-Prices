<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuelPricesController;
use App\Http\Controllers\FuelStationReviewController;
use App\Http\Controllers\FuelStationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/current-prices', [FuelPricesController::class, 'getCurrentPrices']);
Route::get('/historical-prices', [FuelPricesController::class, 'getHistoricalPrices']);

Route::post('/fuel-stations/{fuelStation}/reviews', [FuelStationReviewController::class, 'addReview']);
Route::get('/fuel-stations/{fuelStation}/average-rating', [FuelStationReviewController::class, 'getAverageRating']);

//Route::post('/fuel-stations/{fuelStationId}/reviews', [ReviewController::class, 'store']);
Route::post('/fuel-stations/{fuelStationId}/reviews', 'FuelStationReviewController@store');
Route::post('/fuel-stations/search', [FuelStationController::class, 'search']);

Route::get('/currency-convert', [CurrencyConversionController::class, 'convert']);


Route::get('/get-api-key', function () {
    return response()->json(['apiKey' => env('GOOGLE_MAPS_API_KEY')]);
});
