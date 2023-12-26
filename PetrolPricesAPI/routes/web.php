<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('app');
});
Route::get('/fuel-stations', 'FuelStationController@index')->name('fuel-stations.index');
Route::post('/fuel-stations/search', 'FuelStationController@search')->name('fuel-stations.search');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('auth/{provider}', [LoginController::class, 'redirectToProvider'])->name('to_provider');

Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
