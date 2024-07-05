<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FlatsController;
use App\Http\Controllers\CitiesController;

Route::get('/reports/{city}', [ReportController::class, 'list']);
Route::get('/reports/{city}/{type}/geojson', [ReportController::class, 'geojson']);
Route::post('/reports/submit', [ReportController::class, 'submit']);
Route::get('/tourist-flats/{city}', [FlatsController::class, 'list']);
Route::get('/cities', [CitiesController::class, 'list']);
