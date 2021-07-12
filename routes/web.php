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
Route::post('/adminlogin','App\Http\Controllers\Controller@loginAdmin')->name('adminlogin');

////Route::middleware(['auth:sanctum', 'verified'])->group(function(){
   Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/dashboard',function(){
            return view('dashboardReal');
        })->name('dashboard');
        
        Route::resource('Doctors',App\Http\Controllers\Dashboard\Doctors::class);    
        Route::resource('Patients',App\Http\Controllers\Dashboard\Patients::class);
        Route::resource('Employee',App\Http\Controllers\Dashboard\Employee::class);
   
    
        Route::get('/getPatientsOut','App\Http\Controllers\Dashboard\Patients@indexOut')->name('getPatientsOut');
        Route::get('/getPatientsIn','App\Http\Controllers\Dashboard\Patients@indexIn')->name('getPatientsIn');

        Route::get('/showSensorReadingsForPatient/{id}','App\Http\Controllers\Dashboard\Patients@showSensorReadingsForPatient')->name('sensorReadings');
        Route::get('/showTestValues/{test_id}/{patient_id}','App\Http\Controllers\Dashboard\Patients@showTestValues')->name('showTestValues')  ;
        Route::get('/showReports/{id}','App\Http\Controllers\Dashboard\Patients@showReports')->name('showReports');
        
   });

//);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/searchPatientIn','App\Http\Controllers\Dashboard\Patients@searchIn')->name('searchPatientIn');
Route::get('/searchPatientOut','App\Http\Controllers\Dashboard\Patients@searchOut')->name('searchPatientOut');
Route::get('/search','App\Http\Controllers\Dashboard\Doctors@search')->name('searchDoctors');

Route::get('/searchpatients','App\Http\Controllers\Dashboard\Patients@search')->name('searchPatients');
Route::get('/searchEmployee','App\Http\Controllers\Dashboard\Employee@search')->name('searchEmployee');



