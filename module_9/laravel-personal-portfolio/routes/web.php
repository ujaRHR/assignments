<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::middleware('throttle: 30, 1')->group(function () {
    Route::get("/", HomeController::class)->name("home");
    Route::get("/about", AboutController::class)->name("about");
    Route::get("/projects", ProjectController::class)->name("projects");
    Route::get("/contact", ContactController::class)->name("contact");
    Route::post("/contact", [ContactController::class, 'handlingForm']);
});