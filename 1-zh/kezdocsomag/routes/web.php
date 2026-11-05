<?php

use App\Http\Controllers\SightingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SightingController::class, 'home']) -> name('home');
Route::get('/sightings', [SightingController::class, 'index']) -> name('sightings.index');
Route::patch('/sightings/{sighting}', [SightingController::class, 'identify']) -> name('sightings.identify');
