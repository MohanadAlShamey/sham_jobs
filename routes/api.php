<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware([\App\Http\Middleware\ApiAccessMiddleware::class])->group(function(){
    Route::apiResource('jobs',\App\Http\Controllers\Api\JobController::class)->only('index','show','update');
    Route::apiResource('presents',\App\Http\Controllers\Api\PresentController::class)->only('show');
    Route::get('filter-options',[\App\Http\Controllers\Api\OptionController::class,'filter']);
    Route::get('mails-options',[\App\Http\Controllers\Api\OptionController::class,'mails']);
});
