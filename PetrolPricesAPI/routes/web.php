<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\FuelStationController;
use App\Http\Controllers\FuelPricesController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CurrencyConversionController;


Route::get('/', function () {
    return view('app');
});


Route::get('/historical-prices', [FuelPricesController::class, 'getHistoricalPrices']);
Route::get('/current-prices', [FuelPricesController::class, 'getCurrentPrices']);
Route::get('/results', [FuelStationController::class, 'search'])->name('fuel-stations.search');

Route::get('/fuel-stations', [FuelStationController::class, 'index'])->name('fuel_stations.index');


Route::get('/fuel-stations/create', [FuelStationController::class, 'create'])->name('fuel_stations.create');


Route::post('/fuel-stations', [FuelStationController::class, 'store'])->name('fuel_stations.store');


Route::get('/fuel-stations/{fuelStation}/edit', [FuelStationController::class, 'edit'])->name('fuel_stations.edit');


Route::put('/fuel-stations/{fuelStation}', [FuelStationController::class, 'update'])->name('fuel_stations.update');


Route::delete('/fuel-stations/{fuelStation}', [FuelStationController::class, 'destroy'])->name('fuel_stations.destroy');


Route::get('/fuel-stations/{id}', [FuelStationController::class, 'show'])->name('fuel_stations.show');

Route::get('/search-fuel-stations', 'FuelStationController@search');


Route::post('/submit-ticket', [SupportTicketController::class, 'submitTicket']);
Route::get('/get-tickets', [SupportTicketController::class, 'getTickets']);
//->name('application');



Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/auth/redirect/{provider}', [LoginController::class, 'redirectToProvider'])->name('redirectToProvider');

Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/currency-convert', [CurrencyConversionController::class, 'convert']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password reset routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email verification routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Confirm password route
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
