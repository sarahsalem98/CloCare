<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('/dashboard',function(){
    return view('dashboardReal');
})->name('dashboard');

Route::resource('Doctors',App\Http\Controllers\Dashboard\Doctors::class);

Route::resource('Patients',App\Http\Controllers\Dashboard\Patients::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search','App\Http\Controllers\Dashboard\Doctors@search')->name('searchDoctors');

Route::get('/searchpatients','App\Http\Controllers\Dashboard\Patients@search')->name('searchPatients');



