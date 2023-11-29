<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});
    Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
    Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search')

->name('application');
