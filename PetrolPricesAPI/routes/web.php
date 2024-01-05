<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;

Route::get('/', function () {
    return view('app');
    return view('support');
});
    Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
    Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');

//->name('application');

    Route::post('/submit-ticket', [SupportTicketController::class, 'submitTicket']);
    Route::get('/tickets', [SupportTicketController::class, 'getTickets']);
