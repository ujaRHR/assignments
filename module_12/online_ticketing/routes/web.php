<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\HomeController;


Route::get("/test", [TestController::class, 'test']);
Route::get('/admin', [DashboardController::class, "dashboardPage"])->name("admin");
Route::get('/create-bus', [BusController::class, "busPage"])->name("cb");
Route::get('/locations', [LocationController::class, 'locationPage'])->name('locations');
Route::get('/routes', [RouteController::class, 'routePage'])->name('routes');
Route::get('/trips', [TripsController::class, 'tripsPage'])->name('trips');

// UserZone
Route::get('/home', [HomeController::class, 'homepage'])->name('home');



// Handle POST Requests
Route::post('/create-bus', [BusController::class, 'createBus']);
Route::post('/delete-bus/{id}', [BusController::class, 'deleteBus']);
Route::post('/update-bus/{id}', [BusController::class, 'updateBus']);

Route::post('/locations', [LocationController::class, 'createLocation']);
Route::post('/update-location/{id}', [LocationController::class, 'updateLocation']);
Route::post('/delete-location/{id}', [LocationController::class, 'deleteLocation']);

Route::post('/routes', [RouteController::class, 'createRoute']);
Route::post('/delete-route/{id}', [RouteController::class, 'deleteRoute']);

Route::post('/trips', [TripsController::class, 'createTrip']);
Route::post('/delete-trip/{id}', [TripsController::class, 'deleteTrip']);

