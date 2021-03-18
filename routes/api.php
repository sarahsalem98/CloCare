<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Doctors;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
Route::get('/user', function (Request $request) {
    return $request->user();
   
});

});

Route::get('/status','App\Http\Controllers\Api\Doctors\DoctorController@index')->name('status');
// Route::post('/loginnn','App\Http\Controllers\Api\Doctors\AuthController@login')->name('login.api');
// Route::post('/registerrrrr','App\Http\Controllers\Api\Doctors\AuthController@register')->name('register.api');
