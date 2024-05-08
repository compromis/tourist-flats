<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FlatsController;

Route::get('/reports', [ReportController::class, 'list']);
Route::post('/reports/submit', [ReportController::class, 'submit']);
Route::get('/tourist-flats', [FlatsController::class, 'list']);
