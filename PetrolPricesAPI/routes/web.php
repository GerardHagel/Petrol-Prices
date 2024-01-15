<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\YourController;
use App\Http\Controllers\FuelStationController;
use App\Http\Controllers\FuelPricesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CurrencyConversionController;

Route::get('/', function () {
    return view('app');
});


Route::get('/historical-prices', [FuelPricesController::class, 'getHistoricalPrices']);
Route::get('/current-prices', [FuelPricesController::class, 'getCurrentPrices']);
Route::get('/results', [FuelStationController::class, 'search'])->name('fuel-stations.search');
Route::get('/fuel-stations/{id}', [FuelStationController::class, 'show'])->name('fuel-stations.show');
Route::get('/fuel-stations', [FuelStationController::class, 'index'])->name('fuel-stations.index');
//Route::get('/fuel-stations/create', [FuelStationController::class, 'create'])->name('fuel_stations.create');
Route::get('/fuel-stations/create', 'FuelStationController@create')->name('fuel_stations.create');
Route::post('/fuel-stations', [FuelStationController::class, 'store'])->name('fuel_stations.store');


//Route::post('/api/fuel-stations/search', 'FuelStationController@search');
//Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');
Route::post('/api/fuel-stations/search', [FuelStationController::class, 'search']);
Route::post('/submit-ticket', [SupportTicketController::class, 'submitTicket']);
Route::get('/get-tickets', [SupportTicketController::class, 'getTickets']);
//->name('application');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/redirect/{provider}', [LoginController::class, 'redirectToProvider']);

Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/currency-convert', [CurrencyConversionController::class, 'convert']);
