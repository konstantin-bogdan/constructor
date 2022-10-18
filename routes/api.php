<?php

use App\Http\Controllers\Api\ApiBasicController;
use App\Http\Controllers\Api\ApiFormController;
use App\Http\Controllers\Api\ApiPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('basic/{language}', [ApiBasicController::class, 'basic']);
Route::post('subscribe', [ApiFormController::class, 'subscribe']);
Route::get('/pages/{language}/{any}/{slug?}/{page?}', [ApiPageController::class, 'page']);

Route::fallback(function () {
    return response()->json(['status' => 'Route not fond']);
});

