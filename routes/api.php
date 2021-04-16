<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Doctors;
use Illuminate\Support\Facades\App;

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
  // Route::get('/user', function (Request $request) {
  //   return "advlm";
       
  //   });

});
Route::get('/user', function (Request $request) {
  return "advlm";
     
  });
Route::middleware('auth:doctor')->group(function(){

  Route::post('/addreports/{id}','App\Http\Controllers\Api\Doctors\DoctorController@AddReports');
  Route::get('/showMedicalHistory/{id}','App\Http\Controllers\Api\Doctors\DoctorController@showMedicalHistory');
  Route::resource('/DRpatient','App\Http\Controllers\Api\Doctors\DoctorController');
  Route::get('/searchPatient','App\Http\Controllers\Api\Doctors\DoctorController@searchPatient');
  
  
});


Route::middleware('auth:patient')->group(function(){
   Route::resource('/patient','App\Http\Controllers\Api\Patients\PatientController')->only(['show']);
});


Route::post('/loginPatient','App\Http\Controllers\Api\Patients\AuthController@login');
Route::post('/resetPasswordPatient','App\Http\Controllers\Api\Patients\AuthController@resetPassword');

Route::post('/loginDoctor','App\Http\Controllers\Api\Doctors\AuthController@login');
Route::post('/resetPasswordDoctor','App\Http\Controllers\Api\Doctors\AuthController@resetPassword');

Route::get('/status','App\Http\Controllers\Api\Doctors\DoctorController@index')->name('status');
// Route::post('/loginnn','App\Http\Controllers\Api\Doctors\AuthController@login')->name('login.api');
// Route::post('/registerrrrr','App\Http\Controllers\Api\Doctors\AuthController@register')->name('register.api');
