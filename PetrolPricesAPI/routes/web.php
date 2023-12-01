<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('app');
});
    Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
    Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');
    Route::get('login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback',[LoginController::class,'redirectToGoogleCallback'])
->name('application');


Route::get('/login', function () {
    return view('login');
});
