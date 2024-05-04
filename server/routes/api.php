<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::post('/reports/submit', [ReportController::class, 'submit']);
