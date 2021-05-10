<?php

namespace App\Http\Controllers\Api\Patients;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient= Patients::find(Auth()->user()->id);
        $sensor= new Sensors();
        $sensor->spo2=$request['spo2'];
        $sensor->heartRate=$request['heartRate'];
        $sensor->temp=$request['temp'];
        $patient->sensors()->save($sensor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
