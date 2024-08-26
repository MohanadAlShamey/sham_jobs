<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/home',\App\Http\Controllers\HomeController::class);
Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/resume/{id}',[\App\Http\Controllers\HomeController::class,'downloadResumes'])->middleware('auth:web')->name('download-resumes');
Route::get('/export/{id}',[\App\Http\Controllers\HomeController::class,'exportCsv'])->middleware('auth:web')->name('csv-export');
