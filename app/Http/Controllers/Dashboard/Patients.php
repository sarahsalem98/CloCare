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

        $count_discharge=ModelsPatients::where('statues',1)->count();
        $count_In=ModelsPatients::where('statues',0)->count();

        return view('Patients.Allpatients',
           [
            'patients'=>ModelsPatients::get(),
            'count_discharge'=>$count_discharge,
            'count_In'=>$count_In
            ]);
    }

    public function indexOut(){
        $patients=ModelsPatients::where('statues',1)->get();

        return view('Patients.PatientsOut',['patients'=>$patients]);
    }

    public function indexIn(){
        $patients=ModelsPatients::where('statues',0)->get();
        return view('Patients.PatientsIn',['patients'=>$patients]);
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
        $patient->password=bcrypt($request['national_id']);
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


    public function searchIn (Request $request){
        $word=$request->get('searchPatientIn');
        $patients=ModelsPatients::where('national_id','LIKE','%'.$word.'%')->where('statues',0)->get();
 
        return view('PPatients.PatientsIn',['patients'=>$patients]);
    }

    public function searchOut(Request $request){
        $word=$request->get('searchPatientOut');
        $patients=ModelsPatients::where('national_id','LIKE','%'.$word.'%')->where('statues',1)->get();
 
        return view('Patients.PatientsOut',['patients'=>$patients]);
    }
    public function showSensorReadingsForPatient($id_patient){
        $patient=ModelsPatients::findOrFail($id_patient);
        $sensorPatients=$patient->sensors()->get();
        $avgspo2=$patient->sensors()->avg('spo2');
        $avgtemp=$patient->sensors()->avg('temp');
        $avgheart=$patient->sensors()->avg('heartRate');
               return view ('Patients.Sensor',[
                   
           'sensorPatients'=>$sensorPatients
           ,'patient'=>$patient,
           'avgspo2'=>$avgspo2,
           'avgtemp'=>$avgtemp,
           'avgheart'=>$avgheart
                
             ]);
    
    }


}
