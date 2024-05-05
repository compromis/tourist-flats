<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/reports', [ReportController::class, 'list']);
Route::post('/reports/submit', [ReportController::class, 'submit']);
