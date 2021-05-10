<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor;
use App\Http\Requests\Patients as RequestsPatients;
use App\Http\Requests\PatientsUpdate;
use App\Http\Requests\Addreports;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Reports;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class DoctorController extends Controller


{

    // public function __construct()
    // {
    //     $this->middleware('auth:doctor')->only(['store','destroy','index']);
        
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(["patients"=> Patients::get()],200);
        }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsPatients $request)
    {
       
        try{
            $validatedData=$request->validated();
            $patient= new Patients();
            $patient->fill($validatedData);
            $patient->password=bcrypt($request['password']);
            $patient->api_token=Str::random(100);
            if($request->hasFile('profile_photo_path')){
                $path=$request->file('profile_photo_path')->store('patients');
                $patient->profile_photo_path=$path;
            }
           
            $patient->save();
             return response()->json(["Created Patient"=>$patient],200);

        }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
     

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $patient=Patients::find($id);
            if($patient){
                return response()->json(["desirsd patient"=>$patient],200);
            }else{
              return response()->json(["message"=>"patient is not found"],404);
            }
        }
        catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
     
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
        try{
            $patient=Patients::findOrFail($id);
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
             return response()->json(["Updated patient"=>$patient],200);
        }
        catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $patient=Patients::find($id);
            if($patient){
                $patient->destroy();
                return response()->json(["message"=>"patient has been deleted successfully"],200);
            }else{
                return response()->json(["message"=>"this patient can not be found"],404);
            }
        }  catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
     
    }



    

    public function AddReports( Request $request ,$id){
 
           try{
            $validator = Validator::make($request->all(), [
                'diagnose'=>'required',
                'medicine'=>'required',
                'traits'=>'required',
                'department'=>'required',
                'comments'=>'required',
                'arriving_date'=>'required ||date',
                'discharge_date'=>'required ||date'
            ]);
            if ($validator->fails())
            {
                return response(['message'=>'The given data was invalid.',
                                  'errors'=>$validator->errors()   
                                ], 422);
            }else{
                
                 
            $patient= Patients::find($id);
            // $validatedData=$request->validated();
            if($patient){
               if($request->hasFile('reports_photo_path')){
                        $photoreport=$request->file('reports_photo_path')->store('reports');
                    }
    
                    
                    $patient->makeReports()->attach(Auth::user() ,
                    [ 
                    
                    'diagnose'=>$request['diagnose'],
                    'reports_photo_path'=>$photoreport,
                    'medicine'=>$request['medicine'],
                     'traits'=>$request['traits'],
                     'department'=>$request['department'],
                     'comments'=>$request['comments'],
                     'arriving_date'=>$request['arriving_date'],
                     'discharge_date'=>$request['discharge_date']
                    
                    ]);
                    $patient->statues=1;
                    $patient->save();
                    return response()->json([
                        'message'=>'the report has been added successfuly',
                        'patient ID'=>$patient->id
                    ,'doctors thar make reports to the same patient'=>$patient->makeReports()->get()
                   //  ,'doctor that make the report '=>$patient->hasReports()->get()
                     ],200);
                    }else{
                        return response()->json(['message'=>'patient is not found so you can not add reports'],404);
                    }
            }

           }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
           }

      
    }

         public function showMedicalHistory ($id){
             try{
              
                $patient= Patients::find($id);
                $report=Reports::where('patient_id','=',$id)->get();
                if($patient){
                    return response()->json([
                        // 'all reports this patient has '=>$report
                 'medical_history' => $patient->with('makeReports')->get()[0],
                //    'sdfs'=> $patient->makeReports()->limit(1)->get()
                    ]
                    ,200);
           
                }else{
                    return response()->json(['message'=>'patient is not found'],404);
                }
             }catch(Exception $e){
                return response()->json(['errors' => $e->getMessage()], 500);
            }

        

          }
          public function searchPatient(Request $request){
              try{
            $word = $request->get('search');
            $patients= Patients::where('national_id', 'LIKE', "%{$word}%")->get();
            if($patients){
                return response()->json(['patients found are '=>$patients],200);
            }else{
                return response()->json(['message'=>'no patient found'],404);
            }
            }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
             }
    
          }

}
