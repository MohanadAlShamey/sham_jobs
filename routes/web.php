<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Excel;

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
Route::get('/download/cv/{id}',[\App\Http\Controllers\HomeController::class,'downloadCv'])->name('cv-download');
Route::get('/export/{id}',function ($id){
   $job=\App\Models\Job::find($id);
   $now=now()->format('Y_m_d_h_i');
    return Excel::download(new \App\Exports\GroupExport($id), "{$job->name}_{$now}.xlsx");
   //return view('group-excel',compact('job'));
});
