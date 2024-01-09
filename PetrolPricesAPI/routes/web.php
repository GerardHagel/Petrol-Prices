<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\YourController;
use App\Http\Controllers\FuelStationController;

Route::get('/', function () {
    return view('app');
    return view('support');
});

  //  Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
 //   Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');

//->name('application');

// Route::get('/search', [YourController::class, 'showSearchPage'])->name('search.show');

//Route::get('/fuel-stations/{view}', function ($view) {
//    return view("fuel_stations.{$view}");
//})->where('view', 'index|results|search|show');
//Route::get('/results', 'FuelStationController@search')->name('search.results');

Route::get('/results', [FuelStationController::class, 'search'])->name('fuel-stations.search');
Route::get('/fuel-stations/{id}', [FuelStationController::class, 'show'])->name('fuel-stations.show');
Route::get('/fuel-stations', [FuelStationController::class, 'index'])->name('fuel-stations.index');
Route::get('/fuel-stations/create', [FuelStationController::class, 'create'])->name('fuel_stations.create');


Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');
Route::post('/submit-ticket', [SupportTicketController::class, 'submitTicket']);
Route::get('/get-tickets', [SupportTicketController::class, 'getTickets']);
