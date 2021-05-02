<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients as RequestsPatients;
use App\Http\Requests\PatientsUpdate;
use App\Models\Patients as ModelsPatients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Patients extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Patients.Allpatients',['patients'=>ModelsPatients::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Patients.Addpatients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsPatients $request)
    {
        $validatedData=$request->validated();
        $patient= new ModelsPatients();
        $patient->fill($validatedData);
        $patient->password=bcrypt($request['password']);
        $patient->api_token=Str::random(100);
        if($request->hasFile('profile_photo_path')){
            $path=$request->file('profile_photo_path')->store('patients');
            $patient->profile_photo_path=$path;
        }
       
        $patient->save();
        return redirect(route('Patients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient=ModelsPatients::findOrFail($id);
       return view('Patients.Details',['patient'=>$patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $patient=ModelsPatients::findOrFail($id);
     
       return view('Patients.Edit',['patient'=>$patient]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientsUpdate $request, $id)
    {
        $patient=ModelsPatients::findOrFail($id);
       $validatedData=$request->validated();
       $patient->fill($validatedData);
       if($request->hasFile('profile_photo_path')){
       $path=$request->file('profile_photo_path')->store('patients');
       if($patient->profile_photo_path){
           Storage::delete($patient->profile_photo_path);
       }
        $patient->profile_photo_path=$path;
       }
        $patient->save();
        return redirect(route('Patients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient=ModelsPatients::find($id);
        $patient->delete();
        return redirect(route('Patients.index'));
    }

    public function search (Request $request){
        $word=$request->get('searchPatient');
        $patients=ModelsPatients::where('national_id','LIKE','%'.$word.'%')->get();
 
        return view('Patients.SearchPatients',['patients'=>$patients]);
    }
}
