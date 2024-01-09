<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('app');
    return view('support');
});
Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');

//->name('application');

Route::post('/submit-ticket', [SupportTicketController::class, 'submitTicket']);
Route::get('/tickets', [SupportTicketController::class, 'getTickets']);
Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('auth/{provider}', [LoginController::class, 'redirectToProvider'])->name('to_provider');

Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/convert-currency', [CurrencyConversionController::class, 'convert']);
